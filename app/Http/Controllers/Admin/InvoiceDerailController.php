<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyInvoiceDerailRequest;
use App\Http\Requests\StoreInvoiceDerailRequest;
use App\Http\Requests\UpdateInvoiceDerailRequest;
use App\Models\InvoiceDerail;
use App\Models\Product;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class InvoiceDerailController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('invoice_derail_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = InvoiceDerail::with(['product'])->select(sprintf('%s.*', (new InvoiceDerail)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'invoice_derail_show';
                $editGate      = 'invoice_derail_edit';
                $deleteGate    = 'invoice_derail_delete';
                $crudRoutePart = 'invoice-derails';

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
            $table->addColumn('product_name', function ($row) {
                return $row->product ? $row->product->name : '';
            });

            $table->editColumn('rate', function ($row) {
                return $row->rate ? $row->rate : '';
            });
            $table->editColumn('quantity', function ($row) {
                return $row->quantity ? $row->quantity : '';
            });
            $table->editColumn('product_details', function ($row) {
                return $row->product_details ? $row->product_details : '';
            });
            $table->editColumn('amount', function ($row) {
                return $row->amount ? $row->amount : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'product']);

            return $table->make(true);
        }

        return view('admin.invoiceDerails.index');
    }

    public function create()
    {
        abort_if(Gate::denies('invoice_derail_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.invoiceDerails.create', compact('products'));
    }

    public function store(StoreInvoiceDerailRequest $request)
    {
        $invoiceDerail = InvoiceDerail::create($request->all());

        return redirect()->route('admin.invoice-derails.index');
    }

    public function edit(InvoiceDerail $invoiceDerail)
    {
        abort_if(Gate::denies('invoice_derail_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $invoiceDerail->load('product');

        return view('admin.invoiceDerails.edit', compact('invoiceDerail', 'products'));
    }

    public function update(UpdateInvoiceDerailRequest $request, InvoiceDerail $invoiceDerail)
    {
        $invoiceDerail->update($request->all());

        return redirect()->route('admin.invoice-derails.index');
    }

    public function show(InvoiceDerail $invoiceDerail)
    {
        abort_if(Gate::denies('invoice_derail_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $invoiceDerail->load('product');

        return view('admin.invoiceDerails.show', compact('invoiceDerail'));
    }

    public function destroy(InvoiceDerail $invoiceDerail)
    {
        abort_if(Gate::denies('invoice_derail_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $invoiceDerail->delete();

        return back();
    }

    public function massDestroy(MassDestroyInvoiceDerailRequest $request)
    {
        $invoiceDerails = InvoiceDerail::find(request('ids'));

        foreach ($invoiceDerails as $invoiceDerail) {
            $invoiceDerail->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
