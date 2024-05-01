@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.discount.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.discounts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.discount.fields.id') }}
                        </th>
                        <td>
                            {{ $discount->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.discount.fields.discount_name') }}
                        </th>
                        <td>
                            {{ $discount->discount_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.discount.fields.rate') }}
                        </th>
                        <td>
                            {{ $discount->rate }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.discounts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection