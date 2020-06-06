<?php

namespace App\Http\Requests;

use App\SlideType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroySlideTypeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('slide_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:slide_types,id',
        ];
    }
}
