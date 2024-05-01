<?php

namespace App\Http\Requests;

use App\Models\InvoiceDerail;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyInvoiceDerailRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('invoice_derail_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:invoice_derails,id',
        ];
    }
}
