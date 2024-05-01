<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreShippingChargeRequest;
use App\Http\Requests\UpdateShippingChargeRequest;
use App\Http\Resources\Admin\ShippingChargeResource;
use App\Models\ShippingCharge;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ShippingChargeApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('shipping_charge_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ShippingChargeResource(ShippingCharge::all());
    }

    public function store(StoreShippingChargeRequest $request)
    {
        $shippingCharge = ShippingCharge::create($request->all());

        return (new ShippingChargeResource($shippingCharge))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ShippingCharge $shippingCharge)
    {
        abort_if(Gate::denies('shipping_charge_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ShippingChargeResource($shippingCharge);
    }

    public function update(UpdateShippingChargeRequest $request, ShippingCharge $shippingCharge)
    {
        $shippingCharge->update($request->all());

        return (new ShippingChargeResource($shippingCharge))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ShippingCharge $shippingCharge)
    {
        abort_if(Gate::denies('shipping_charge_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $shippingCharge->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
