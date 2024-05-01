<?php

namespace App\Http\Requests;

use App\Models\AddInvoiceMaster;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAddInvoiceMasterRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('add_invoice_master_create');
    }

    public function rules()
    {
        return [
            'select_client_id' => [
                'required',
                'integer',
            ],
            'invoice_number' => [
                'string',
                'required',
                'unique:add_invoice_masters',
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
