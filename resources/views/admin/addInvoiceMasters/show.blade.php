@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.addInvoiceMaster.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.add-invoice-masters.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
                <a class="btn btn-success" href="{{ route('admin.add-invoice-masters.generate-pdf',$addInvoiceMaster->id) }}">
                    PDF Download
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.addInvoiceMaster.fields.id') }}
                        </th>
                        <td>
                            {{ $addInvoiceMaster->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.addInvoiceMaster.fields.select_client') }}
                        </th>
                        <td>
                            {{ $addInvoiceMaster->select_client->company_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.addInvoiceMaster.fields.invoice_number') }}
                        </th>
                        <td>
                            {{ $addInvoiceMaster->invoice_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.addInvoiceMaster.fields.inv_date') }}
                        </th>
                        <td>
                            {{ $addInvoiceMaster->inv_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.addInvoiceMaster.fields.payment_status') }}
                        </th>
                        <td>
                            {{ $addInvoiceMaster->payment_status->payment_status ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.addInvoiceMaster.fields.billing_address') }}
                        </th>
                        <td>
                            {{ $addInvoiceMaster->billing_address->full_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.addInvoiceMaster.fields.shipping_address') }}
                        </th>
                        <td>
                            {{ $addInvoiceMaster->shipping_address->shipping_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.addInvoiceMaster.fields.sub_total') }}
                        </th>
                        <td>
                            {{ $addInvoiceMaster->sub_total }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.addInvoiceMaster.fields.discount') }}
                        </th>
                        <td>
                            {{ $addInvoiceMaster->discount }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.addInvoiceMaster.fields.tax') }}
                        </th>
                        <td>
                            {{ $addInvoiceMaster->tax }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.addInvoiceMaster.fields.shipping_charge') }}
                        </th>
                        <td>
                            {{ $addInvoiceMaster->shipping_charge }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.addInvoiceMaster.fields.total_amount') }}
                        </th>
                        <td>
                            {{ $addInvoiceMaster->total_amount }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.addInvoiceMaster.fields.notes') }}
                        </th>
                        <td>
                            {{ $addInvoiceMaster->notes }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.add-invoice-masters.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
