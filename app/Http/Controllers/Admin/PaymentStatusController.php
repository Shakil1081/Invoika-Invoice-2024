<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPaymentStatusRequest;
use App\Http\Requests\StorePaymentStatusRequest;
use App\Http\Requests\UpdatePaymentStatusRequest;
use App\Models\PaymentStatus;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PaymentStatusController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('payment_status_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $paymentStatuses = PaymentStatus::all();

        return view('admin.paymentStatuses.index', compact('paymentStatuses'));
    }

    public function create()
    {
        abort_if(Gate::denies('payment_status_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.paymentStatuses.create');
    }

    public function store(StorePaymentStatusRequest $request)
    {
        $paymentStatus = PaymentStatus::create($request->all());

        return redirect()->route('admin.payment-statuses.index');
    }

    public function edit(PaymentStatus $paymentStatus)
    {
        abort_if(Gate::denies('payment_status_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.paymentStatuses.edit', compact('paymentStatus'));
    }

    public function update(UpdatePaymentStatusRequest $request, PaymentStatus $paymentStatus)
    {
        $paymentStatus->update($request->all());

        return redirect()->route('admin.payment-statuses.index');
    }

    public function show(PaymentStatus $paymentStatus)
    {
        abort_if(Gate::denies('payment_status_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.paymentStatuses.show', compact('paymentStatus'));
    }

    public function destroy(PaymentStatus $paymentStatus)
    {
        abort_if(Gate::denies('payment_status_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $paymentStatus->delete();

        return back();
    }

    public function massDestroy(MassDestroyPaymentStatusRequest $request)
    {
        $paymentStatuses = PaymentStatus::find(request('ids'));

        foreach ($paymentStatuses as $paymentStatus) {
            $paymentStatus->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
