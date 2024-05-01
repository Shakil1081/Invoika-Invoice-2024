@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.taxList.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.tax-lists.update", [$taxList->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="tax_name">{{ trans('cruds.taxList.fields.tax_name') }}</label>
                <input class="form-control {{ $errors->has('tax_name') ? 'is-invalid' : '' }}" type="text" name="tax_name" id="tax_name" value="{{ old('tax_name', $taxList->tax_name) }}" required>
                @if($errors->has('tax_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tax_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.taxList.fields.tax_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="tax_rate_in">{{ trans('cruds.taxList.fields.tax_rate_in') }}</label>
                <input class="form-control {{ $errors->has('tax_rate_in') ? 'is-invalid' : '' }}" type="text" name="tax_rate_in" id="tax_rate_in" value="{{ old('tax_rate_in', $taxList->tax_rate_in) }}" required>
                @if($errors->has('tax_rate_in'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tax_rate_in') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.taxList.fields.tax_rate_in_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.taxList.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status" required>
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\TaxList::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', $taxList->status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.taxList.fields.status_helper') }}</span>
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