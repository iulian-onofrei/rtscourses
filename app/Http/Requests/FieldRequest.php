<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FieldRequest extends FormRequest
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
            'name' => 'required|max:255',
            'email' => 'email',
            'phone' => 'numeric',
            'file' => 'mimes:jpeg,png,jpg,svg',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name is required',
            'email.email'  => 'The email is invalid',
            'phone.numeric' => 'Invalid phone format',
            'file.mimes'  => 'Invalid photo format',
        ];
    }
}
