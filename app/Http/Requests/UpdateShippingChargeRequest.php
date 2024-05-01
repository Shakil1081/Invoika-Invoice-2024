<?php

namespace App\Http\Requests;

use App\Models\ShippingCharge;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateShippingChargeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('shipping_charge_edit');
    }

    public function rules()
    {
        return [
            'tax_name' => [
                'string',
                'required',
            ],
            'country' => [
                'string',
                'required',
            ],
            'tax_rate_in' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
