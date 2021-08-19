<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule as ValidationRule;

class RoomRequests extends FormRequest
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
            'room_id' => [
                'required',
                ValidationRule::unique('room')->ignore($this->id)
                ],
            'roomDes' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'room_id.required' => 'Room Id is needed.',
            'roomDes.required' => ' Please Provide sufficent Room Description',
        ];
    }
}
