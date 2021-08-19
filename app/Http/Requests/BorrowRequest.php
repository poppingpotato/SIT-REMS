<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule as ValidationRule;

class BorrowRequest extends FormRequest
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
            'employee_id' => 'required_without_all:student_id',
            'student_id' => 'required_without_all:employee_id',
            'eq_b_id' => 'required',
            'start' => 'required',
        ];
    }

    public function messages()
    {
        return [
            
            'eq_b_id.required' => 'Equipment Id is needed',
            'start.required' => 'Start date is required',
        ];
    }
}
