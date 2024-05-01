<?php

namespace App\Http\Requests;

use App\Models\BrandList;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreBrandListRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('brand_list_create');
    }

    public function rules()
    {
        return [
            'brand_name' => [
                'string',
                'required',
                'unique:brand_lists',
            ],
        ];
    }
}
