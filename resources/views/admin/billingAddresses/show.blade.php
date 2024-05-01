@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.billingAddress.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.billing-addresses.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.billingAddress.fields.full_name') }}
                        </th>
                        <td>
                            {{ $billingAddress->full_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.billingAddress.fields.billing_address') }}
                        </th>
                        <td>
                            {{ $billingAddress->billing_address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.billingAddress.fields.billing_mobile_number') }}
                        </th>
                        <td>
                            {{ $billingAddress->billing_mobile_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.billingAddress.fields.billing_tax_number') }}
                        </th>
                        <td>
                            {{ $billingAddress->billing_tax_number }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.billing-addresses.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection