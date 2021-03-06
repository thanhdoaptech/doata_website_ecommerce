<?php

namespace App\Http\Requests;

use App\ProductOption;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreProductOptionRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('product_option_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'products.*' => [
                'integer',
            ],
            'products'   => [
                'array',
            ],
            'options.*'  => [
                'integer',
            ],
            'options'    => [
                'array',
            ],
        ];
    }
}
