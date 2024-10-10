@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.addInvoiceMaster.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.add-invoice-masters.update", [$addInvoiceMaster->id]) }}" enctype="multipart/form-data" class="form-layout">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12">
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
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
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
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
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
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
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
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
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
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
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
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    Invoice Details
                </div>
                <div class="card-body">
                    @foreach($addInvoiceMaster->invoice_details as $invoiceDerail)
                    <div id="invoice-rows">
                        <div class="row invoice-row">
                                <div class="col-xl-3 col-lg-2 col-md-2">
                                    <input type="hidden" value="{{ $invoiceDerail->id }}" name="invoice_detail_ids[]">
                                    <div class="form-group">
                                        <label for="product_id">{{ trans('cruds.invoiceDerail.fields.product') }}</label>
                                        <select class="form-control select2" name="product_id[]" id="product_id">
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
                                <div class="col-xl-2 col-lg-2 col-md-2">
                                    <div class="form-group">
                                        <label class="required" for="rate">{{ trans('cruds.invoiceDerail.fields.rate') }}</label>
                                        <input class="form-control" type="number" name="rate[]" id="rate" value="{{  $invoiceDerail->rate }}" step="0.01" required>

                                        <span class="help-block">{{ trans('cruds.invoiceDerail.fields.rate_helper') }}</span>
                                    </div>
                                </div>
                                <div class="col-xl-2 col-lg-2 col-md-2">
                                    <div class="form-group">
                                        <label class="required" for="quantity">{{ trans('cruds.invoiceDerail.fields.quantity') }}</label>
                                        <input class="form-control" type="number" name="quantity[]" id="quantity" value="{{ $invoiceDerail->quantity }}" required>
                                        @if($errors->has('quantity'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('quantity') }}
                                            </div>
                                        @endif
                                        <span class="help-block">{{ trans('cruds.invoiceDerail.fields.quantity_helper') }}</span>
                                    </div>
                                </div>
                                <div class="col-xl-2 col-lg-2 col-md-2">
                                    <div class="form-group">
                                        <label for="product_details">{{ trans('cruds.invoiceDerail.fields.product_details') }}</label>
                                        <input class="form-control" type="text" name="product_details[]" id="product_details" value="{{ $invoiceDerail->product_details }}">
                                        @if($errors->has('product_details'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('product_details') }}
                                            </div>
                                        @endif
                                        <span class="help-block">{{ trans('cruds.invoiceDerail.fields.product_details_helper') }}</span>
                                    </div>
                                </div>
                                <div class="col-xl-2 col-lg-2 col-md-2">
                                    <div class="form-group">
                                        <label class="required" for="amount">{{ trans('cruds.invoiceDerail.fields.amount') }}</label>
                                        <input class="form-control" type="number" name="amount[]" id="amount" value="{{ $invoiceDerail->amount }}" step="0.01" required readonly>
                                        @if($errors->has('amount'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('amount') }}
                                            </div>
                                        @endif
                                        <span class="help-block">{{ trans('cruds.invoiceDerail.fields.amount_helper') }}</span>
                                    </div>
                                </div>
                                <div class="col-xl-1 col-lg-2 col-md-2 text-right">
                                    <button type="button" class="btn btn-sm btn-danger remove-row" style="margin-top: 31px;" disabled><i class="fa fa-minus"></i></button>
                                    <button type="button" class="btn btn-sm btn-success add-row" style="margin-top: 31px;"><i class="fa fa-plus"></i></button>
                                </div>
                            </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label class="required" for="sub_total">{{ trans('cruds.addInvoiceMaster.fields.sub_total') }}</label>
                        <input class="form-control {{ $errors->has('sub_total') ? 'is-invalid' : '' }}" type="number" name="sub_total" id="sub_total" value="{{ old('sub_total', $addInvoiceMaster->sub_total) }}" step="0.01" required readonly>
                        @if($errors->has('sub_total'))
                            <div class="invalid-feedback">
                                {{ $errors->first('sub_total') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.addInvoiceMaster.fields.sub_total_helper') }}</span>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
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
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
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
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
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
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label class="required" for="total_amount">{{ trans('cruds.addInvoiceMaster.fields.total_amount') }}</label>
                        <input class="form-control {{ $errors->has('total_amount') ? 'is-invalid' : '' }}" type="number" name="total_amount" id="total_amount" value="{{ old('total_amount', $addInvoiceMaster->total_amount) }}" step="0.01" required readonly>
                        @if($errors->has('total_amount'))
                            <div class="invalid-feedback">
                                {{ $errors->first('total_amount') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.addInvoiceMaster.fields.total_amount_helper') }}</span>
                    </div>
                </div>
                <div class="col-lg-12 col-md-6 col-sm-12">
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


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        let rowCount = $('#invoice-rows .invoice-row').length || 1;
        let selectedProducts = [];

        function calculateAmount(row) {
            const rate = parseFloat(row.find('input[name="rate[]"]').val()) || 0;
            const quantity = parseFloat(row.find('input[name="quantity[]"]').val()) || 0;
            const amount = rate * quantity;
            row.find('input[name="amount[]"]').val(amount.toFixed(2));
        }

        function calculateTotals() {
            let subtotal = 0;

            $('input[name="amount[]"]').each(function() {
                subtotal += parseFloat($(this).val()) || 0;
            });

            $('#sub_total').val(subtotal.toFixed(2));

            const discount = parseFloat($('#discount').val()) || 0;
            const tax = parseFloat($('#tax').val()) || 0;
            const shippingCharge = parseFloat($('#shipping_charge').val()) || 0;

            const totalAmount = subtotal - discount + tax + shippingCharge;
            $('#total_amount').val(totalAmount.toFixed(2));
        }

        function toggleRemoveButtons() {
            if (rowCount <= 1) {
                $('.remove-row').attr('disabled', true);
            } else {
                $('.remove-row').attr('disabled', false);
            }
        }

        function updateProductSelects() {
            $('[name="product_id[]"]').each(function() {
                const currentSelect = $(this);
                const currentValue = currentSelect.val();
                currentSelect.find('option').each(function() {
                    const optionValue = $(this).val();
                    if (selectedProducts.includes(optionValue) && optionValue !== currentValue) {
                        $(this).prop('disabled', true);
                    } else {
                        $(this).prop('disabled', false);
                    }
                });
            });
        }

        // Populate selectedProducts with existing rows
        $('[name="product_id[]"]').each(function() {
            const value = $(this).val();
            if (value) {
                selectedProducts.push(value);
            }
        });

        // Call this function to disable products that are already selected
        updateProductSelects();
        toggleRemoveButtons();

        $(document).on('click', '.add-row', function() {
            const newRowIndex = rowCount;
            const newRow = `
            <div class="row invoice-row">
                <div class="col-3">
                    <div class="form-group">
                        <label for="product_id">{{ trans('cruds.invoiceDerail.fields.product') }}</label>
                        <select class="form-control select2" name="product_id[]" id="product_id_${newRowIndex}">
                            @foreach($products as $id => $entry)
            <option value="{{ $id }}">{{ $entry }}</option>
                            @endforeach
            </select>
            <span class="help-block">{{ trans('cruds.invoiceDerail.fields.product_helper') }}</span>
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label class="required" for="rate">{{ trans('cruds.invoiceDerail.fields.rate') }}</label>
                        <input class="form-control" type="number" name="rate[]" value="" step="0.01" required>
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label class="required" for="quantity">{{ trans('cruds.invoiceDerail.fields.quantity') }}</label>
                        <input class="form-control" type="number" name="quantity[]" value="1" required>
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label for="product_details">{{ trans('cruds.invoiceDerail.fields.product_details') }}</label>
                        <input class="form-control" type="text" name="product_details[]" value="">
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label class="required" for="amount">{{ trans('cruds.invoiceDerail.fields.amount') }}</label>
                        <input class="form-control" type="number" name="amount[]" value="" step="0.01" required readonly>
                    </div>
                </div>
                <div class="col-1 text-right">
                    <button type="button" class="btn btn-sm btn-danger remove-row" style="margin-top: 31px;"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-sm btn-success add-row" style="margin-top: 31px;"><i class="fa fa-plus"></i></button>
                </div>
            </div>
            `;
            $('#invoice-rows').append(newRow);
            rowCount++;
            updateProductSelects();
            toggleRemoveButtons();
        });

        $(document).on('input', 'input[name="rate[]"], input[name="quantity[]"]', function() {
            const row = $(this).closest('.invoice-row');
            calculateAmount(row);
            calculateTotals();
        });

        $(document).on('click', '.remove-row', function() {
            const row = $(this).closest('.invoice-row');
            const productId = row.find('[name="product_id[]"]').val();
            selectedProducts = selectedProducts.filter(id => id !== productId);
            row.remove();
            rowCount--;
            calculateTotals();
            updateProductSelects();
            toggleRemoveButtons();
        });

        $(document).on('change', '[name="product_id[]"]', function() {
            const productId = $(this).val();
            const currentRowIndex = $(this).attr('id').split('_')[2];

            if (!selectedProducts.includes(productId)) {
                selectedProducts.push(productId);
            }

            updateProductSelects();
        });

        $(document).on('input', '#discount, #tax, #shipping_charge', function() {
            calculateTotals();
        });
    });
</script>

@endsection
