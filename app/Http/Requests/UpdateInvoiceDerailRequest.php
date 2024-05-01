<?php

namespace App\Http\Requests;

use App\Models\InvoiceDerail;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateInvoiceDerailRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('invoice_derail_edit');
    }

    public function rules()
    {
        return [
            'rate' => [
                'required',
            ],
            'quantity' => [
                'string',
                'required',
            ],
            'product_details' => [
                'string',
                'nullable',
            ],
            'amount' => [
                'required',
            ],
        ];
    }
}
