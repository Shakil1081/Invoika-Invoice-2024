@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.brandList.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.brand-lists.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="brand_name">{{ trans('cruds.brandList.fields.brand_name') }}</label>
                <input class="form-control {{ $errors->has('brand_name') ? 'is-invalid' : '' }}" type="text" name="brand_name" id="brand_name" value="{{ old('brand_name', '') }}" required>
                @if($errors->has('brand_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('brand_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.brandList.fields.brand_name_helper') }}</span>
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