<?php

namespace App\Http\Requests;

use App\Course;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateCourseRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('course_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'teacher_id'  => [
                'required',
                'integer',
            ],
            'title'       => [
                'required',
            ],
            'description' => [
                'required',
            ],
            'students.*'  => [
                'integer',
            ],
            'students'    => [
                'array',
            ],
        ];
    }
}
