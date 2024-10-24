@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.billingAddress.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.billing-addresses.update", [$billingAddress->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="company_id">{{ trans('cruds.billingAddress.fields.company_id') }}</label>
                        <select class="form-control select2 {{ $errors->has('company_id') ? 'is-invalid' : '' }}" name="company_id" id="company_id" required>
                            @foreach($companies as $id => $entry)
                                <option value="{{ $id }}" {{ $billingAddress->company_id == $id ? 'selected' : '' }}>{{ $entry }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('company_id'))
                            <div class="invalid-feedback">
                                {{ $errors->first('company_id') }}
                            </div>
                        @endif
{{--                        <span class="help-block">{{ trans('cruds.billingAddress.fields.company_id') }}</span>--}}
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label class="required" for="full_name">{{ trans('cruds.billingAddress.fields.full_name') }}</label>
                        <input class="form-control {{ $errors->has('full_name') ? 'is-invalid' : '' }}" type="text" name="full_name" id="full_name" value="{{ old('full_name', $billingAddress->full_name) }}" required>
                        @if($errors->has('full_name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('full_name') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.billingAddress.fields.full_name_helper') }}</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label class="required" for="billing_mobile_number">{{ trans('cruds.billingAddress.fields.billing_mobile_number') }}</label>
                        <input class="form-control {{ $errors->has('billing_mobile_number') ? 'is-invalid' : '' }}" type="text" name="billing_mobile_number" id="billing_mobile_number" value="{{ old('billing_mobile_number', $billingAddress->billing_mobile_number) }}" required>
                        @if($errors->has('billing_mobile_number'))
                            <div class="invalid-feedback">
                                {{ $errors->first('billing_mobile_number') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.billingAddress.fields.billing_mobile_number_helper') }}</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="billing_tax_number">{{ trans('cruds.billingAddress.fields.billing_tax_number') }}</label>
                        <input class="form-control {{ $errors->has('billing_tax_number') ? 'is-invalid' : '' }}" type="text" name="billing_tax_number" id="billing_tax_number" value="{{ old('billing_tax_number', $billingAddress->billing_tax_number) }}">
                        @if($errors->has('billing_tax_number'))
                            <div class="invalid-feedback">
                                {{ $errors->first('billing_tax_number') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.billingAddress.fields.billing_tax_number_helper') }}</span>
                    </div>
                </div>
                <div class="col-lg-12 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label class="required" for="billing_address">{{ trans('cruds.billingAddress.fields.billing_address') }}</label>
                        <textarea class="form-control {{ $errors->has('billing_address') ? 'is-invalid' : '' }}" name="billing_address" id="billing_address" required>{{ old('billing_address', $billingAddress->billing_address) }}</textarea>
                        @if($errors->has('billing_address'))
                            <div class="invalid-feedback">
                                {{ $errors->first('billing_address') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.billingAddress.fields.billing_address_helper') }}</span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection
