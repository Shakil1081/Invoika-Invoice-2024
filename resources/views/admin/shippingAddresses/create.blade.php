@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.shippingAddress.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.shipping-addresses.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="company_id">{{ trans('cruds.billingAddress.fields.company_id') }}</label>
                        <select class="form-control select2 {{ $errors->has('company_id') ? 'is-invalid' : '' }}" name="company_id" id="company_id" required>
                            @foreach($companies as $id => $entry)
                                <option value="{{ $id }}" {{ old('company_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
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
                        <label class="required" for="shipping_name">{{ trans('cruds.shippingAddress.fields.shipping_name') }}</label>
                        <input class="form-control {{ $errors->has('shipping_name') ? 'is-invalid' : '' }}" type="text" name="shipping_name" id="shipping_name" value="{{ old('shipping_name', '') }}" required>
                        @if($errors->has('shipping_name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('shipping_name') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.shippingAddress.fields.shipping_name_helper') }}</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label class="required" for="shippling_mobile_number">{{ trans('cruds.shippingAddress.fields.shippling_mobile_number') }}</label>
                        <input class="form-control {{ $errors->has('shippling_mobile_number') ? 'is-invalid' : '' }}" type="text" name="shippling_mobile_number" id="shippling_mobile_number" value="{{ old('shippling_mobile_number', '') }}" required>
                        @if($errors->has('shippling_mobile_number'))
                            <div class="invalid-feedback">
                                {{ $errors->first('shippling_mobile_number') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.shippingAddress.fields.shippling_mobile_number_helper') }}</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="shippling_tax_number">{{ trans('cruds.shippingAddress.fields.shippling_tax_number') }}</label>
                        <input class="form-control {{ $errors->has('shippling_tax_number') ? 'is-invalid' : '' }}" type="text" name="shippling_tax_number" id="shippling_tax_number" value="{{ old('shippling_tax_number', '') }}">
                        @if($errors->has('shippling_tax_number'))
                            <div class="invalid-feedback">
                                {{ $errors->first('shippling_tax_number') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.shippingAddress.fields.shippling_tax_number_helper') }}</span>
                    </div>
                </div>
                <div class="col-lg-12 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="shippling_address">{{ trans('cruds.shippingAddress.fields.shippling_address') }}</label>
                        <textarea class="form-control {{ $errors->has('shippling_address') ? 'is-invalid' : '' }}" name="shippling_address" id="shippling_address">{{ old('shippling_address') }}</textarea>
                        @if($errors->has('shippling_address'))
                            <div class="invalid-feedback">
                                {{ $errors->first('shippling_address') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.shippingAddress.fields.shippling_address_helper') }}</span>
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
