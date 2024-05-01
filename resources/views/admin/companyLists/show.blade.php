@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.companyList.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.company-lists.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.companyList.fields.id') }}
                        </th>
                        <td>
                            {{ $companyList->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.companyList.fields.company_name') }}
                        </th>
                        <td>
                            {{ $companyList->company_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.companyList.fields.logo') }}
                        </th>
                        <td>
                            @if($companyList->logo)
                                <a href="{{ $companyList->logo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $companyList->logo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.companyList.fields.website_url') }}
                        </th>
                        <td>
                            {{ $companyList->website_url }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.companyList.fields.email') }}
                        </th>
                        <td>
                            {{ $companyList->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.companyList.fields.contact_no') }}
                        </th>
                        <td>
                            {{ $companyList->contact_no }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.companyList.fields.postalcode') }}
                        </th>
                        <td>
                            {{ $companyList->postalcode }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.companyList.fields.invoice_number_slug') }}
                        </th>
                        <td>
                            {{ $companyList->invoice_number_slug }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.companyList.fields.address') }}
                        </th>
                        <td>
                            {{ $companyList->address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.companyList.fields.approved_signature') }}
                        </th>
                        <td>
                            @foreach($companyList->approved_signature as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $media->getUrl('thumb') }}">
                                </a>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.company-lists.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection