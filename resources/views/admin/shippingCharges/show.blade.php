@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.shippingCharge.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.shipping-charges.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.shippingCharge.fields.id') }}
                        </th>
                        <td>
                            {{ $shippingCharge->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.shippingCharge.fields.tax_name') }}
                        </th>
                        <td>
                            {{ $shippingCharge->tax_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.shippingCharge.fields.country') }}
                        </th>
                        <td>
                            {{ $shippingCharge->country }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.shippingCharge.fields.tax_rate_in') }}
                        </th>
                        <td>
                            {{ $shippingCharge->tax_rate_in }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.shipping-charges.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection