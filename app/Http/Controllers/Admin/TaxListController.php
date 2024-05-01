<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyTaxListRequest;
use App\Http\Requests\StoreTaxListRequest;
use App\Http\Requests\UpdateTaxListRequest;
use App\Models\TaxList;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class TaxListController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('tax_list_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = TaxList::query()->select(sprintf('%s.*', (new TaxList)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'tax_list_show';
                $editGate      = 'tax_list_edit';
                $deleteGate    = 'tax_list_delete';
                $crudRoutePart = 'tax-lists';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('tax_name', function ($row) {
                return $row->tax_name ? $row->tax_name : '';
            });
            $table->editColumn('tax_rate_in', function ($row) {
                return $row->tax_rate_in ? $row->tax_rate_in : '';
            });
            $table->editColumn('status', function ($row) {
                return $row->status ? TaxList::STATUS_SELECT[$row->status] : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.taxLists.index');
    }

    public function create()
    {
        abort_if(Gate::denies('tax_list_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.taxLists.create');
    }

    public function store(StoreTaxListRequest $request)
    {
        $taxList = TaxList::create($request->all());

        return redirect()->route('admin.tax-lists.index');
    }

    public function edit(TaxList $taxList)
    {
        abort_if(Gate::denies('tax_list_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.taxLists.edit', compact('taxList'));
    }

    public function update(UpdateTaxListRequest $request, TaxList $taxList)
    {
        $taxList->update($request->all());

        return redirect()->route('admin.tax-lists.index');
    }

    public function show(TaxList $taxList)
    {
        abort_if(Gate::denies('tax_list_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.taxLists.show', compact('taxList'));
    }

    public function destroy(TaxList $taxList)
    {
        abort_if(Gate::denies('tax_list_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $taxList->delete();

        return back();
    }

    public function massDestroy(MassDestroyTaxListRequest $request)
    {
        $taxLists = TaxList::find(request('ids'));

        foreach ($taxLists as $taxList) {
            $taxList->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
