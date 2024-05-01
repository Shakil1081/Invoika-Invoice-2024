@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.invoiceDerail.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.invoice-derails.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.invoiceDerail.fields.id') }}
                        </th>
                        <td>
                            {{ $invoiceDerail->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoiceDerail.fields.product') }}
                        </th>
                        <td>
                            {{ $invoiceDerail->product->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoiceDerail.fields.rate') }}
                        </th>
                        <td>
                            {{ $invoiceDerail->rate }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoiceDerail.fields.quantity') }}
                        </th>
                        <td>
                            {{ $invoiceDerail->quantity }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoiceDerail.fields.product_details') }}
                        </th>
                        <td>
                            {{ $invoiceDerail->product_details }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoiceDerail.fields.amount') }}
                        </th>
                        <td>
                            {{ $invoiceDerail->amount }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.invoice-derails.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection