@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.shippingAddress.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.shipping-addresses.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.shippingAddress.fields.shipping_name') }}
                        </th>
                        <td>
                            {{ $shippingAddress->shipping_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.shippingAddress.fields.shippling_address') }}
                        </th>
                        <td>
                            {{ $shippingAddress->shippling_address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.shippingAddress.fields.shippling_mobile_number') }}
                        </th>
                        <td>
                            {{ $shippingAddress->shippling_mobile_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.shippingAddress.fields.shippling_tax_number') }}
                        </th>
                        <td>
                            {{ $shippingAddress->shippling_tax_number }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.shipping-addresses.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection