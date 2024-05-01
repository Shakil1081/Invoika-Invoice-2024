<?php

namespace App\Http\Requests;

use App\Models\TaxList;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTaxListRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('tax_list_create');
    }

    public function rules()
    {
        return [
            'tax_name' => [
                'string',
                'required',
                'unique:tax_lists',
            ],
            'tax_rate_in' => [
                'string',
                'required',
            ],
            'status' => [
                'required',
            ],
        ];
    }
}
