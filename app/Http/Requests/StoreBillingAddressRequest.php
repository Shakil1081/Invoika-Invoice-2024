<?php

namespace App\Http\Requests;

use App\Models\BillingAddress;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreBillingAddressRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('billing_address_create');
    }

    public function rules()
    {
        return [
            'full_name' => [
                'string',
                'required',
            ],
            'billing_address' => [
                'required',
            ],
            'billing_mobile_number' => [
                'string',
                'required',
            ],
            'billing_tax_number' => [
                'string',
                'nullable',
            ],
        ];
    }
}
