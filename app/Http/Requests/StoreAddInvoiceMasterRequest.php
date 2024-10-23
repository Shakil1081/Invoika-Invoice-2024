<?php

namespace App\Http\Requests;

use App\Models\AddInvoiceMaster;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;

class StoreAddInvoiceMasterRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('add_invoice_master_create');
    }

    public function rules()
    {
        $invoiceId = $this->route('add_invoice_master')->id ?? '';
        return [
            'product_id' => 'required|array',
            'product_id.*' => 'required|exists:products,id',
            'rate' => 'required|array',
            'rate.*' => 'required|numeric|min:0',
            'quantity' => 'required|array',
            'quantity.*' => 'required|integer|min:1',
            'product_details' => 'nullable|array',
            'product_details.*' => 'string|max:255',
            'amount' => 'required|array',
            'amount.*' => 'required|numeric|min:0',
            'select_client_id' => [
                'required',
                'integer',
            ],
            'invoice_number' => [
                'string',
                'required',
                Rule::unique('add_invoice_masters')->ignore($invoiceId),
            ],
            'inv_date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'payment_status_id' => [
                'required',
                'integer',
            ],
            'shipping_address_id' => [
                'required',
                'integer',
            ],
            'sub_total' => [
                'required',
            ],
            'total_amount' => [
                'required',
            ],
        ];
    }
}
