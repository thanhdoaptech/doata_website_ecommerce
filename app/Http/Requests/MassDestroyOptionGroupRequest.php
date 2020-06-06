<?php

namespace App\Http\Requests;

use App\OptionGroup;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyOptionGroupRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('option_group_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:option_groups,id',
        ];
    }
}
