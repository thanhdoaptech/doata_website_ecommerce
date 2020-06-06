<?php

namespace App\Http\Requests;

use App\TopMenu;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateTopMenuRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('top_menu_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [];
    }
}
