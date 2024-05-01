<?php

namespace App\Http\Requests;

use App\Models\PaymentStatus;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePaymentStatusRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('payment_status_edit');
    }

    public function rules()
    {
        return [
            'payment_status' => [
                'string',
                'required',
                'unique:payment_statuses,payment_status,' . request()->route('payment_status')->id,
            ],
        ];
    }
}
