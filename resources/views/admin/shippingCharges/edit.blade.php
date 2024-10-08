@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.shippingCharge.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.shipping-charges.update", [$shippingCharge->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label class="required" for="tax_name">{{ trans('cruds.shippingCharge.fields.tax_name') }}</label>
                        <input class="form-control {{ $errors->has('tax_name') ? 'is-invalid' : '' }}" type="text" name="tax_name" id="tax_name" value="{{ old('tax_name', $shippingCharge->tax_name) }}" required>
                        @if($errors->has('tax_name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('tax_name') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.shippingCharge.fields.tax_name_helper') }}</span>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label class="required" for="country">{{ trans('cruds.shippingCharge.fields.country') }}</label>
                        <input class="form-control {{ $errors->has('country') ? 'is-invalid' : '' }}" type="text" name="country" id="country" value="{{ old('country', $shippingCharge->country) }}" required>
                        @if($errors->has('country'))
                            <div class="invalid-feedback">
                                {{ $errors->first('country') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.shippingCharge.fields.country_helper') }}</span>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label class="required" for="tax_rate_in">{{ trans('cruds.shippingCharge.fields.tax_rate_in') }}</label>
                        <input class="form-control {{ $errors->has('tax_rate_in') ? 'is-invalid' : '' }}" type="number" name="tax_rate_in" id="tax_rate_in" value="{{ old('tax_rate_in', $shippingCharge->tax_rate_in) }}" step="1" required>
                        @if($errors->has('tax_rate_in'))
                            <div class="invalid-feedback">
                                {{ $errors->first('tax_rate_in') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.shippingCharge.fields.tax_rate_in_helper') }}</span>
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
