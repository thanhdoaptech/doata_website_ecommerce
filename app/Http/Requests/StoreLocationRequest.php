<?php

namespace App\Http\Requests;

use App\Location;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreLocationRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('location_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'code'   => [
                'required',
            ],
            'name'   => [
                'required',
            ],
            'parent' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'sort'   => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
