@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.color.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.colors.update", [$color->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="color_name">{{ trans('cruds.color.fields.color_name') }}</label>
                <input class="form-control {{ $errors->has('color_name') ? 'is-invalid' : '' }}" type="text" name="color_name" id="color_name" value="{{ old('color_name', $color->color_name) }}">
                @if($errors->has('color_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('color_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.color.fields.color_name_helper') }}</span>
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