@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.clientList.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.client-lists.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.clientList.fields.id') }}
                        </th>
                        <td>
                            {{ $clientList->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clientList.fields.first_name') }}
                        </th>
                        <td>
                            {{ $clientList->first_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clientList.fields.last_name') }}
                        </th>
                        <td>
                            {{ $clientList->last_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clientList.fields.username') }}
                        </th>
                        <td>
                            {{ $clientList->username }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clientList.fields.mobile_number') }}
                        </th>
                        <td>
                            {{ $clientList->mobile_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clientList.fields.email') }}
                        </th>
                        <td>
                            {{ $clientList->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clientList.fields.country') }}
                        </th>
                        <td>
                            {{ $clientList->country }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clientList.fields.password') }}
                        </th>
                        <td>
                            ********
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.client-lists.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection