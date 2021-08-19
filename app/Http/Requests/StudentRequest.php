<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule as ValidationRule;

class StudentRequest extends FormRequest
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
            'student_id' => [
                'required',
                ValidationRule::unique('student')->ignore($this->id)
                ],
            'lastName' => 'required',
            'firstName' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'student_id.required' => 'Student Id is required',
            'lastName.required' => 'Last name is required',
            'firstName.required' => 'First name is required',
        ];
    }
}
