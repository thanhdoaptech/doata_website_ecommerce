<?php

namespace App\Http\Requests;

use App\CustomerSupport;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreCustomerSupportRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('customer_support_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'sort' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
