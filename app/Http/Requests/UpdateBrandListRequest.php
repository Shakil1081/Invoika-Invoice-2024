<?php

namespace App\Http\Requests;

use App\Models\BrandList;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateBrandListRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('brand_list_edit');
    }

    public function rules()
    {
        return [
            'brand_name' => [
                'string',
                'required',
                'unique:brand_lists,brand_name,' . request()->route('brand_list')->id,
            ],
        ];
    }
}
