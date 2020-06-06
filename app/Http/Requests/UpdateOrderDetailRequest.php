<?php

namespace App\Http\Requests;

use App\OrderDetail;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateOrderDetailRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('order_detail_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'orders.*'   => [
                'integer',
            ],
            'orders'     => [
                'array',
            ],
            'products.*' => [
                'integer',
            ],
            'products'   => [
                'array',
            ],
            'quanity'    => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
