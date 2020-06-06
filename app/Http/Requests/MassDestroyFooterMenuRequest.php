<?php

namespace App\Http\Requests;

use App\FooterMenu;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyFooterMenuRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('footer_menu_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:footer_menus,id',
        ];
    }
}
