<?php

namespace App\Http\Requests;

use App\Models\CategoryList;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyCategoryListRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('category_list_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:category_lists,id',
        ];
    }
}
