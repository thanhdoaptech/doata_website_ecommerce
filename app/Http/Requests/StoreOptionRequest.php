<?php

namespace App\Http\Requests;

use App\Option;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreOptionRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('option_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'groups.*' => [
                'integer',
            ],
            'groups'   => [
                'array',
            ],
        ];
    }
}
