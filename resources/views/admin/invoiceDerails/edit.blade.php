@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.invoiceDerail.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.invoice-derails.update", [$invoiceDerail->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="product_id">{{ trans('cruds.invoiceDerail.fields.product') }}</label>
                        <select class="form-control select2 {{ $errors->has('product') ? 'is-invalid' : '' }}" name="product_id" id="product_id">
                            @foreach($products as $id => $entry)
                                <option value="{{ $id }}" {{ (old('product_id') ? old('product_id') : $invoiceDerail->product->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('product'))
                            <div class="invalid-feedback">
                                {{ $errors->first('product') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.invoiceDerail.fields.product_helper') }}</span>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label class="required" for="rate">{{ trans('cruds.invoiceDerail.fields.rate') }}</label>
                        <input class="form-control {{ $errors->has('rate') ? 'is-invalid' : '' }}" type="number" name="rate" id="rate" value="{{ old('rate', $invoiceDerail->rate) }}" step="0.01" required>
                        @if($errors->has('rate'))
                            <div class="invalid-feedback">
                                {{ $errors->first('rate') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.invoiceDerail.fields.rate_helper') }}</span>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label class="required" for="quantity">{{ trans('cruds.invoiceDerail.fields.quantity') }}</label>
                        <input class="form-control {{ $errors->has('quantity') ? 'is-invalid' : '' }}" type="text" name="quantity" id="quantity" value="{{ old('quantity', $invoiceDerail->quantity) }}" required>
                        @if($errors->has('quantity'))
                            <div class="invalid-feedback">
                                {{ $errors->first('quantity') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.invoiceDerail.fields.quantity_helper') }}</span>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="product_details">{{ trans('cruds.invoiceDerail.fields.product_details') }}</label>
                        <input class="form-control {{ $errors->has('product_details') ? 'is-invalid' : '' }}" type="text" name="product_details" id="product_details" value="{{ old('product_details', $invoiceDerail->product_details) }}">
                        @if($errors->has('product_details'))
                            <div class="invalid-feedback">
                                {{ $errors->first('product_details') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.invoiceDerail.fields.product_details_helper') }}</span>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label class="required" for="amount">{{ trans('cruds.invoiceDerail.fields.amount') }}</label>
                        <input class="form-control {{ $errors->has('amount') ? 'is-invalid' : '' }}" type="number" name="amount" id="amount" value="{{ old('amount', $invoiceDerail->amount) }}" step="0.01" required>
                        @if($errors->has('amount'))
                            <div class="invalid-feedback">
                                {{ $errors->first('amount') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.invoiceDerail.fields.amount_helper') }}</span>
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
