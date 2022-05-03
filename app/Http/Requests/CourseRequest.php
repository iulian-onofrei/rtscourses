<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|max:255',
            'description' => 'required',
            'course_img' => 'required|mimes:jpeg,png,jpg,svg',
            'course_doc' => 'required|mimes:pdf,doc,docx',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Name is required',
            'description.required'  => 'The description is required',
            'course_img.mimes' => 'Invalid photo format',
            'course_doc.mimes'  => 'Invalid file format',
        ];
    }
}
