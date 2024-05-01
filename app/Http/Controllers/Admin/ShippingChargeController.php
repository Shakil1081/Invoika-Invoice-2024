<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyShippingChargeRequest;
use App\Http\Requests\StoreShippingChargeRequest;
use App\Http\Requests\UpdateShippingChargeRequest;
use App\Models\ShippingCharge;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ShippingChargeController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('shipping_charge_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = ShippingCharge::query()->select(sprintf('%s.*', (new ShippingCharge)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'shipping_charge_show';
                $editGate      = 'shipping_charge_edit';
                $deleteGate    = 'shipping_charge_delete';
                $crudRoutePart = 'shipping-charges';

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
            $table->editColumn('country', function ($row) {
                return $row->country ? $row->country : '';
            });
            $table->editColumn('tax_rate_in', function ($row) {
                return $row->tax_rate_in ? $row->tax_rate_in : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.shippingCharges.index');
    }

    public function create()
    {
        abort_if(Gate::denies('shipping_charge_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.shippingCharges.create');
    }

    public function store(StoreShippingChargeRequest $request)
    {
        $shippingCharge = ShippingCharge::create($request->all());

        return redirect()->route('admin.shipping-charges.index');
    }

    public function edit(ShippingCharge $shippingCharge)
    {
        abort_if(Gate::denies('shipping_charge_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.shippingCharges.edit', compact('shippingCharge'));
    }

    public function update(UpdateShippingChargeRequest $request, ShippingCharge $shippingCharge)
    {
        $shippingCharge->update($request->all());

        return redirect()->route('admin.shipping-charges.index');
    }

    public function show(ShippingCharge $shippingCharge)
    {
        abort_if(Gate::denies('shipping_charge_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.shippingCharges.show', compact('shippingCharge'));
    }

    public function destroy(ShippingCharge $shippingCharge)
    {
        abort_if(Gate::denies('shipping_charge_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $shippingCharge->delete();

        return back();
    }

    public function massDestroy(MassDestroyShippingChargeRequest $request)
    {
        $shippingCharges = ShippingCharge::find(request('ids'));

        foreach ($shippingCharges as $shippingCharge) {
            $shippingCharge->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
