@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.taxList.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tax-lists.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.taxList.fields.id') }}
                        </th>
                        <td>
                            {{ $taxList->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.taxList.fields.tax_name') }}
                        </th>
                        <td>
                            {{ $taxList->tax_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.taxList.fields.tax_rate_in') }}
                        </th>
                        <td>
                            {{ $taxList->tax_rate_in }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.taxList.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\TaxList::STATUS_SELECT[$taxList->status] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tax-lists.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection