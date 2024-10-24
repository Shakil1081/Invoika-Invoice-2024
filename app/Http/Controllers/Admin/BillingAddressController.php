<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyBillingAddressRequest;
use App\Http\Requests\StoreBillingAddressRequest;
use App\Http\Requests\UpdateBillingAddressRequest;
use App\Models\BillingAddress;
use App\Models\CompanyList;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class BillingAddressController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('billing_address_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = BillingAddress::with('company')->select(sprintf('%s.*', (new BillingAddress)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'billing_address_show';
                $editGate      = 'billing_address_edit';
                $deleteGate    = 'billing_address_delete';
                $crudRoutePart = 'billing-addresses';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->addColumn('company_name', function ($row) {
                return $row->company ? $row->company->company_name : '';
            });
            $table->editColumn('full_name', function ($row) {
                return $row->full_name ? $row->full_name : '';
            });
            $table->editColumn('billing_address', function ($row) {
                return $row->billing_address ? $row->billing_address : '';
            });
            $table->editColumn('billing_mobile_number', function ($row) {
                return $row->billing_mobile_number ? $row->billing_mobile_number : '';
            });
            $table->editColumn('billing_tax_number', function ($row) {
                return $row->billing_tax_number ? $row->billing_tax_number : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.billingAddresses.index');
    }

    public function create()
    {
        abort_if(Gate::denies('billing_address_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $companies = CompanyList::pluck('company_name', 'id')->prepend(trans('global.pleaseSelect'), '');
        return view('admin.billingAddresses.create',compact('companies'));
    }

    public function store(StoreBillingAddressRequest $request)
    {
        $billingAddress = BillingAddress::create($request->all());

        return redirect()->route('admin.billing-addresses.index');
    }

    public function edit(BillingAddress $billingAddress)
    {
        abort_if(Gate::denies('billing_address_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $companies = CompanyList::pluck('company_name', 'id')->prepend(trans('global.pleaseSelect'), '');
        return view('admin.billingAddresses.edit', compact('billingAddress','companies'));
    }

    public function update(UpdateBillingAddressRequest $request, BillingAddress $billingAddress)
    {
        $billingAddress->update($request->all());

        return redirect()->route('admin.billing-addresses.index');
    }

    public function show(BillingAddress $billingAddress)
    {
        abort_if(Gate::denies('billing_address_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.billingAddresses.show', compact('billingAddress'));
    }

    public function destroy(BillingAddress $billingAddress)
    {
        abort_if(Gate::denies('billing_address_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $billingAddress->delete();

        return back();
    }

    public function massDestroy(MassDestroyBillingAddressRequest $request)
    {
        $billingAddresses = BillingAddress::find(request('ids'));

        foreach ($billingAddresses as $billingAddress) {
            $billingAddress->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
