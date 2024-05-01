<?php

namespace App\Http\Requests;

use App\Models\CategoryList;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCategoryListRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('category_list_create');
    }

    public function rules()
    {
        return [
            'category_name' => [
                'string',
                'required',
                'unique:category_lists',
            ],
        ];
    }
}
