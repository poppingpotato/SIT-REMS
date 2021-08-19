<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReserveRequest extends FormRequest
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
            
            'eq_r_id'=>'required_without_all:room_id',
            'room_id'=>'required_without_all:eq_r_id',
            'start' => 'required',
            'end' => 'required',
        ];
    }

    public function messages()
    {
        return [
           'start.required' => 'Start date is required',
           'end.required' => 'End date is required',
        ];
    }
}
