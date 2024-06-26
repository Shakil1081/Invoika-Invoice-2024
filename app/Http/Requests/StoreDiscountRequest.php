<?php

namespace App\Http\Requests;

use App\Models\Discount;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDiscountRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('discount_create');
    }

    public function rules()
    {
        return [
            'discount_name' => [
                'string',
                'nullable',
            ],
            'rate' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
