@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.addInvoiceMaster.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.add-invoice-masters.update", [$addInvoiceMaster->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="select_client_id">{{ trans('cruds.addInvoiceMaster.fields.select_client') }}</label>
                <select class="form-control select2 {{ $errors->has('select_client') ? 'is-invalid' : '' }}" name="select_client_id" id="select_client_id" required>
                    @foreach($select_clients as $id => $entry)
                        <option value="{{ $id }}" {{ (old('select_client_id') ? old('select_client_id') : $addInvoiceMaster->select_client->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('select_client'))
                    <div class="invalid-feedback">
                        {{ $errors->first('select_client') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.addInvoiceMaster.fields.select_client_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="invoice_number">{{ trans('cruds.addInvoiceMaster.fields.invoice_number') }}</label>
                <input class="form-control {{ $errors->has('invoice_number') ? 'is-invalid' : '' }}" type="text" name="invoice_number" id="invoice_number" value="{{ old('invoice_number', $addInvoiceMaster->invoice_number) }}" required>
                @if($errors->has('invoice_number'))
                    <div class="invalid-feedback">
                        {{ $errors->first('invoice_number') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.addInvoiceMaster.fields.invoice_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="inv_date">{{ trans('cruds.addInvoiceMaster.fields.inv_date') }}</label>
                <input class="form-control date {{ $errors->has('inv_date') ? 'is-invalid' : '' }}" type="text" name="inv_date" id="inv_date" value="{{ old('inv_date', $addInvoiceMaster->inv_date) }}" required>
                @if($errors->has('inv_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('inv_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.addInvoiceMaster.fields.inv_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="payment_status_id">{{ trans('cruds.addInvoiceMaster.fields.payment_status') }}</label>
                <select class="form-control select2 {{ $errors->has('payment_status') ? 'is-invalid' : '' }}" name="payment_status_id" id="payment_status_id" required>
                    @foreach($payment_statuses as $id => $entry)
                        <option value="{{ $id }}" {{ (old('payment_status_id') ? old('payment_status_id') : $addInvoiceMaster->payment_status->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('payment_status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('payment_status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.addInvoiceMaster.fields.payment_status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="billing_address_id">{{ trans('cruds.addInvoiceMaster.fields.billing_address') }}</label>
                <select class="form-control select2 {{ $errors->has('billing_address') ? 'is-invalid' : '' }}" name="billing_address_id" id="billing_address_id">
                    @foreach($billing_addresses as $id => $entry)
                        <option value="{{ $id }}" {{ (old('billing_address_id') ? old('billing_address_id') : $addInvoiceMaster->billing_address->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('billing_address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('billing_address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.addInvoiceMaster.fields.billing_address_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="shipping_address_id">{{ trans('cruds.addInvoiceMaster.fields.shipping_address') }}</label>
                <select class="form-control select2 {{ $errors->has('shipping_address') ? 'is-invalid' : '' }}" name="shipping_address_id" id="shipping_address_id" required>
                    @foreach($shipping_addresses as $id => $entry)
                        <option value="{{ $id }}" {{ (old('shipping_address_id') ? old('shipping_address_id') : $addInvoiceMaster->shipping_address->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('shipping_address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('shipping_address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.addInvoiceMaster.fields.shipping_address_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="sub_total">{{ trans('cruds.addInvoiceMaster.fields.sub_total') }}</label>
                <input class="form-control {{ $errors->has('sub_total') ? 'is-invalid' : '' }}" type="number" name="sub_total" id="sub_total" value="{{ old('sub_total', $addInvoiceMaster->sub_total) }}" step="0.01" required>
                @if($errors->has('sub_total'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sub_total') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.addInvoiceMaster.fields.sub_total_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="discount">{{ trans('cruds.addInvoiceMaster.fields.discount') }}</label>
                <input class="form-control {{ $errors->has('discount') ? 'is-invalid' : '' }}" type="number" name="discount" id="discount" value="{{ old('discount', $addInvoiceMaster->discount) }}" step="0.01">
                @if($errors->has('discount'))
                    <div class="invalid-feedback">
                        {{ $errors->first('discount') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.addInvoiceMaster.fields.discount_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tax">{{ trans('cruds.addInvoiceMaster.fields.tax') }}</label>
                <input class="form-control {{ $errors->has('tax') ? 'is-invalid' : '' }}" type="number" name="tax" id="tax" value="{{ old('tax', $addInvoiceMaster->tax) }}" step="0.01">
                @if($errors->has('tax'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tax') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.addInvoiceMaster.fields.tax_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="shipping_charge">{{ trans('cruds.addInvoiceMaster.fields.shipping_charge') }}</label>
                <input class="form-control {{ $errors->has('shipping_charge') ? 'is-invalid' : '' }}" type="number" name="shipping_charge" id="shipping_charge" value="{{ old('shipping_charge', $addInvoiceMaster->shipping_charge) }}" step="0.01">
                @if($errors->has('shipping_charge'))
                    <div class="invalid-feedback">
                        {{ $errors->first('shipping_charge') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.addInvoiceMaster.fields.shipping_charge_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="total_amount">{{ trans('cruds.addInvoiceMaster.fields.total_amount') }}</label>
                <input class="form-control {{ $errors->has('total_amount') ? 'is-invalid' : '' }}" type="number" name="total_amount" id="total_amount" value="{{ old('total_amount', $addInvoiceMaster->total_amount) }}" step="0.01" required>
                @if($errors->has('total_amount'))
                    <div class="invalid-feedback">
                        {{ $errors->first('total_amount') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.addInvoiceMaster.fields.total_amount_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="notes">{{ trans('cruds.addInvoiceMaster.fields.notes') }}</label>
                <textarea class="form-control {{ $errors->has('notes') ? 'is-invalid' : '' }}" name="notes" id="notes">{{ old('notes', $addInvoiceMaster->notes) }}</textarea>
                @if($errors->has('notes'))
                    <div class="invalid-feedback">
                        {{ $errors->first('notes') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.addInvoiceMaster.fields.notes_helper') }}</span>
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