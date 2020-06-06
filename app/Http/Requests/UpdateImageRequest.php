<?php

namespace App\Http\Requests;

use App\Image;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateImageRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('image_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'url' => [
                'max:255',
                'required',
            ],
        ];
    }
}
