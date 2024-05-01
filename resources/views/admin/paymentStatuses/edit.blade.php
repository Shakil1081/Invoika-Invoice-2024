@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.paymentStatus.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.payment-statuses.update", [$paymentStatus->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="payment_status">{{ trans('cruds.paymentStatus.fields.payment_status') }}</label>
                <input class="form-control {{ $errors->has('payment_status') ? 'is-invalid' : '' }}" type="text" name="payment_status" id="payment_status" value="{{ old('payment_status', $paymentStatus->payment_status) }}" required>
                @if($errors->has('payment_status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('payment_status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.paymentStatus.fields.payment_status_helper') }}</span>
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