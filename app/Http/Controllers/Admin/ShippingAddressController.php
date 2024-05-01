<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyShippingAddressRequest;
use App\Http\Requests\StoreShippingAddressRequest;
use App\Http\Requests\UpdateShippingAddressRequest;
use App\Models\ShippingAddress;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ShippingAddressController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('shipping_address_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = ShippingAddress::query()->select(sprintf('%s.*', (new ShippingAddress)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'shipping_address_show';
                $editGate      = 'shipping_address_edit';
                $deleteGate    = 'shipping_address_delete';
                $crudRoutePart = 'shipping-addresses';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('shipping_name', function ($row) {
                return $row->shipping_name ? $row->shipping_name : '';
            });
            $table->editColumn('shippling_address', function ($row) {
                return $row->shippling_address ? $row->shippling_address : '';
            });
            $table->editColumn('shippling_mobile_number', function ($row) {
                return $row->shippling_mobile_number ? $row->shippling_mobile_number : '';
            });
            $table->editColumn('shippling_tax_number', function ($row) {
                return $row->shippling_tax_number ? $row->shippling_tax_number : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.shippingAddresses.index');
    }

    public function create()
    {
        abort_if(Gate::denies('shipping_address_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.shippingAddresses.create');
    }

    public function store(StoreShippingAddressRequest $request)
    {
        $shippingAddress = ShippingAddress::create($request->all());

        return redirect()->route('admin.shipping-addresses.index');
    }

    public function edit(ShippingAddress $shippingAddress)
    {
        abort_if(Gate::denies('shipping_address_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.shippingAddresses.edit', compact('shippingAddress'));
    }

    public function update(UpdateShippingAddressRequest $request, ShippingAddress $shippingAddress)
    {
        $shippingAddress->update($request->all());

        return redirect()->route('admin.shipping-addresses.index');
    }

    public function show(ShippingAddress $shippingAddress)
    {
        abort_if(Gate::denies('shipping_address_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.shippingAddresses.show', compact('shippingAddress'));
    }

    public function destroy(ShippingAddress $shippingAddress)
    {
        abort_if(Gate::denies('shipping_address_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $shippingAddress->delete();

        return back();
    }

    public function massDestroy(MassDestroyShippingAddressRequest $request)
    {
        $shippingAddresses = ShippingAddress::find(request('ids'));

        foreach ($shippingAddresses as $shippingAddress) {
            $shippingAddress->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
