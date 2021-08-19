<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule as ValidationRule;

class EmployeeRequest extends FormRequest
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
            'employee_id' => [
                'required',
                ValidationRule::unique('employee')->ignore($this->id)
                ],
            'lastName' => 'required',
            'firstName' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'employee_id.required' => 'Employee Id is required',
            'lastName.required' => 'Last name is required',
            'firstName.required' => 'First name is required',
        ];
    }
}
