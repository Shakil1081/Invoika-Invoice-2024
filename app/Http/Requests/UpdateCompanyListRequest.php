<?php

namespace App\Http\Requests;

use App\Models\CompanyList;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCompanyListRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('company_list_edit');
    }

    public function rules()
    {
        return [
            'company_name' => [
                'string',
                'required',
            ],
            'website_url' => [
                'string',
                'nullable',
            ],
            'email' => [
                'required',
                'unique:company_lists,email,' . request()->route('company_list')->id,
            ],
            'contact_no' => [
                'string',
                'required',
                'unique:company_lists,contact_no,' . request()->route('company_list')->id,
            ],
            'postalcode' => [
                'string',
                'required',
            ],
            'invoice_number_slug' => [
                'string',
                'required',
            ],
            'address' => [
                'required',
            ],
            'approved_signature' => [
                'array',
            ],
        ];
    }
}
