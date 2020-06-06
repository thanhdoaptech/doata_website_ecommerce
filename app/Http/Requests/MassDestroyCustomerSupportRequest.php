<?php

namespace App\Http\Requests;

use App\CustomerSupport;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyCustomerSupportRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('customer_support_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:customer_supports,id',
        ];
    }
}
