<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAddInvoiceMasterRequest;
use App\Http\Requests\StoreAddInvoiceMasterRequest;
use App\Http\Requests\UpdateAddInvoiceMasterRequest;
use App\Models\AddInvoiceMaster;
use App\Models\BillingAddress;
use App\Models\CompanyList;
use App\Models\InvoiceDerail;
use App\Models\PaymentStatus;
use App\Models\Product;
use App\Models\ShippingAddress;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AddInvoiceMasterController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('add_invoice_master_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $addInvoiceMasters = AddInvoiceMaster::with(['select_client', 'payment_status', 'billing_address', 'shipping_address'])->get();

        return view('admin.addInvoiceMasters.index', compact('addInvoiceMasters'));
    }

    public function create()
    {
        abort_if(Gate::denies('add_invoice_master_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $select_clients = CompanyList::pluck('company_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $payment_statuses = PaymentStatus::pluck('payment_status', 'id')->prepend(trans('global.pleaseSelect'), '');

        $billing_addresses = BillingAddress::pluck('full_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $shipping_addresses = ShippingAddress::pluck('shipping_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.addInvoiceMasters.create', compact('billing_addresses', 'payment_statuses', 'select_clients', 'shipping_addresses'));
    }

    public function createWithDetails()
    {
        abort_if(Gate::denies('add_invoice_master_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $select_clients = CompanyList::pluck('company_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $payment_statuses = PaymentStatus::pluck('payment_status', 'id')->prepend(trans('global.pleaseSelect'), '');

        $billing_addresses = BillingAddress::pluck('full_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $shipping_addresses = ShippingAddress::pluck('shipping_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $products = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.addInvoiceMasters.create_with_details', compact('billing_addresses', 'payment_statuses', 'select_clients', 'shipping_addresses','products'));
    }

    public function store(StoreAddInvoiceMasterRequest $request)
    {
        $addInvoiceMaster = AddInvoiceMaster::create($request->all());

        return redirect()->route('admin.add-invoice-masters.index');
    }

    public function storeWithDetails(StoreAddInvoiceMasterRequest $request)
    {
        $productIds = request('product_id');
        $rates = request('rate');
        $quantities = request('quantity');
        $productDetails = request('product_details');
        $amount = request('amount');

        $invoiceDetailsList = [];

        for ($i = 0; $i < count($productIds); $i++) {
            $invoiceDetailsList[] = [
                'product_id' => $productIds[$i],
                'rate' => $rates[$i],
                'quantity' => $quantities[$i],
                'product_details' => $productDetails[$i],
                'amount' => $amount[$i],
            ];
        }

        foreach ($invoiceDetailsList as $invoiceDetails) {
            InvoiceDerail::create($invoiceDetails);
        }

        AddInvoiceMaster::create($request->all());
    }

    public function edit(AddInvoiceMaster $addInvoiceMaster)
    {
        abort_if(Gate::denies('add_invoice_master_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $select_clients = CompanyList::pluck('company_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $payment_statuses = PaymentStatus::pluck('payment_status', 'id')->prepend(trans('global.pleaseSelect'), '');

        $billing_addresses = BillingAddress::pluck('full_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $shipping_addresses = ShippingAddress::pluck('shipping_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $addInvoiceMaster->load('select_client', 'payment_status', 'billing_address', 'shipping_address');

        return view('admin.addInvoiceMasters.edit', compact('addInvoiceMaster', 'billing_addresses', 'payment_statuses', 'select_clients', 'shipping_addresses'));
    }

    public function update(UpdateAddInvoiceMasterRequest $request, AddInvoiceMaster $addInvoiceMaster)
    {
        $addInvoiceMaster->update($request->all());

        return redirect()->route('admin.add-invoice-masters.index');
    }

    public function show(AddInvoiceMaster $addInvoiceMaster)
    {
        abort_if(Gate::denies('add_invoice_master_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $addInvoiceMaster->load('select_client', 'payment_status', 'billing_address', 'shipping_address');

        return view('admin.addInvoiceMasters.show', compact('addInvoiceMaster'));
    }

    public function destroy(AddInvoiceMaster $addInvoiceMaster)
    {
        abort_if(Gate::denies('add_invoice_master_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $addInvoiceMaster->delete();

        return back();
    }

    public function massDestroy(MassDestroyAddInvoiceMasterRequest $request)
    {
        $addInvoiceMasters = AddInvoiceMaster::find(request('ids'));

        foreach ($addInvoiceMasters as $addInvoiceMaster) {
            $addInvoiceMaster->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
