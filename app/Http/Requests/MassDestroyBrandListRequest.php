<?php

namespace App\Http\Requests;

use App\Models\BrandList;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyBrandListRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('brand_list_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:brand_lists,id',
        ];
    }
}
