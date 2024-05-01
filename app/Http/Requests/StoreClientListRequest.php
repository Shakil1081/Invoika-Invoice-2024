<?php

namespace App\Http\Requests;

use App\Models\ClientList;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreClientListRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('client_list_create');
    }

    public function rules()
    {
        return [
            'first_name' => [
                'string',
                'required',
            ],
            'last_name' => [
                'string',
                'nullable',
            ],
            'username' => [
                'string',
                'required',
                'unique:client_lists',
            ],
            'mobile_number' => [
                'string',
                'required',
                'unique:client_lists',
            ],
            'email' => [
                'required',
            ],
            'country' => [
                'string',
                'nullable',
            ],
        ];
    }
}
