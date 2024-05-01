<?php

namespace App\Http\Requests;

use App\Models\BillingAddress;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyBillingAddressRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('billing_address_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:billing_addresses,id',
        ];
    }
}
