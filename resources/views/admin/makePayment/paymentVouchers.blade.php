@extends('layouts.admin')
@section('content')
    @can('payment_status_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">

            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            Invoice List
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-PaymentStatus">
                    <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.makePayment.fields.transaction_id') }}
                        </th>
                        <th>
                            {{ trans('cruds.makePayment.fields.amount_paid') }}
                        </th>
                        <th>
                            {{ trans('cruds.makePayment.fields.due_amount') }}
                        </th>
                        <th>
                            {{ trans('cruds.makePayment.fields.payment_method') }}
                        </th>
                        <th>
                            {{ trans('cruds.makePayment.fields.created_at') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($payments as $key => $payment)
                        <tr data-entry-id="{{ $payment->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $payment->transaction_id ?? '' }}
                            </td>
                            <td>
                                {{ $payment->amount_paid ?? '' }}
                            </td>
                            <td>{{ $payment->due_amount ?? 0 }}</td>
                            <td>{{ $payment->payment_method ?? 0 }}</td>
                            <td>{{ \Carbon\Carbon::parse($payment->created_at)->format('d-m-Y') ?? 0 }}</td>
                            <td width="15%">
                                <a class="btn btn-xs btn-success" href="{{ route('admin.invoice.paymentVouchers.download', $payment->id) }}">
                                    Download Voucher
                                </a>
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>



@endsection
