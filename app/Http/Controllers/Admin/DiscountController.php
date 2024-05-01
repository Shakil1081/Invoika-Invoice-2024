<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyDiscountRequest;
use App\Http\Requests\StoreDiscountRequest;
use App\Http\Requests\UpdateDiscountRequest;
use App\Models\Discount;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DiscountController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('discount_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $discounts = Discount::all();

        return view('admin.discounts.index', compact('discounts'));
    }

    public function create()
    {
        abort_if(Gate::denies('discount_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.discounts.create');
    }

    public function store(StoreDiscountRequest $request)
    {
        $discount = Discount::create($request->all());

        return redirect()->route('admin.discounts.index');
    }

    public function edit(Discount $discount)
    {
        abort_if(Gate::denies('discount_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.discounts.edit', compact('discount'));
    }

    public function update(UpdateDiscountRequest $request, Discount $discount)
    {
        $discount->update($request->all());

        return redirect()->route('admin.discounts.index');
    }

    public function show(Discount $discount)
    {
        abort_if(Gate::denies('discount_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.discounts.show', compact('discount'));
    }

    public function destroy(Discount $discount)
    {
        abort_if(Gate::denies('discount_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $discount->delete();

        return back();
    }

    public function massDestroy(MassDestroyDiscountRequest $request)
    {
        $discounts = Discount::find(request('ids'));

        foreach ($discounts as $discount) {
            $discount->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
