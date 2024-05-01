<?php

namespace App\Http\Requests;

use App\Models\CompanyList;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCompanyListRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('company_list_create');
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
                'unique:company_lists',
            ],
            'contact_no' => [
                'string',
                'required',
                'unique:company_lists',
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
