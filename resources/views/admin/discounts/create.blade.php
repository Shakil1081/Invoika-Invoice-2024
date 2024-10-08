@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.discount.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.discounts.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="discount_name">{{ trans('cruds.discount.fields.discount_name') }}</label>
                        <input class="form-control {{ $errors->has('discount_name') ? 'is-invalid' : '' }}" type="text" name="discount_name" id="discount_name" value="{{ old('discount_name', '') }}">
                        @if($errors->has('discount_name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('discount_name') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.discount.fields.discount_name_helper') }}</span>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="rate">{{ trans('cruds.discount.fields.rate') }}</label>
                        <input class="form-control {{ $errors->has('rate') ? 'is-invalid' : '' }}" type="number" name="rate" id="rate" value="{{ old('rate', '') }}" step="1">
                        @if($errors->has('rate'))
                            <div class="invalid-feedback">
                                {{ $errors->first('rate') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.discount.fields.rate_helper') }}</span>
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
