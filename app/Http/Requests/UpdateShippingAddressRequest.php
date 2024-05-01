<?php

namespace App\Http\Requests;

use App\Models\ShippingAddress;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateShippingAddressRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('shipping_address_edit');
    }

    public function rules()
    {
        return [
            'shipping_name' => [
                'string',
                'required',
            ],
            'shippling_mobile_number' => [
                'string',
                'required',
            ],
            'shippling_tax_number' => [
                'string',
                'nullable',
            ],
        ];
    }
}
