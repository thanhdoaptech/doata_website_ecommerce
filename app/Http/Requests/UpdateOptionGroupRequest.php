<?php

namespace App\Http\Requests;

use App\OptionGroup;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateOptionGroupRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('option_group_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [];
    }
}
