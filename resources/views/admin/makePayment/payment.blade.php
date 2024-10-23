@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.makePayment.title_singular') }}  <h3>Invoice: {{ $invoice->invoice_number }}</h3>
            <p>Total: {{ $invoice->total_amount }}</p>
            <p>Due: {{ $invoice->total_amount - $invoice->payments->sum('amount_paid') }}</p>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("admin.invoice.processPayment", $invoice->id) }}">
                @csrf
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label class="required" for="amount">{{ trans('cruds.makePayment.fields.amount_paid') }}</label>
                            <input class="form-control" type="number" name="amount" id="amount" step="0.01" max="{{ $invoice->total_amount - $invoice->payments->sum('amount_paid') }}">
                            @if($errors->has('amount'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('amount') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.paymentStatus.fields.payment_status_helper') }}</span>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="required" for="payment_method">{{ trans('cruds.makePayment.fields.payment_method') }}</label>
                            <select class="form-control" name="payment_method" id="payment_method">
                                @foreach($paymentTypes as $id => $entry)
                                    <option value="{{ $entry }}" {{ old('payment_method') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('amount'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('amount') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.paymentStatus.fields.payment_status_helper') }}</span>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="form-group">
                            <label class="required" for="tax">{{ trans('cruds.makePayment.fields.tax_amount') }}</label>
                            <select class="form-control" name="tax" id="tax">
                                <option value="Include" {{ old('tax') == 'Include' ? 'selected' : '' }}>Include</option>
                                <option value="Exclude" {{ old('tax') == 'Exclude' ? 'selected' : '' }}>Exclude</option>
                            </select>
                            @if($errors->has('tax'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('tax') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.paymentStatus.fields.payment_status_helper') }}</span>
                        </div>
                    </div>

                </div>
                <div class="form-group">
                    <button class="btn btn-danger" type="submit">
                        {{ trans('global.pay') }}
                    </button>
                </div>
            </form>
        </div>
    </div>



@endsection
