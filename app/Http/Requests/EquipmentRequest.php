<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule as ValidationRule;

class EquipmentRequest extends FormRequest
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
            'equipment_id' => [
                'required',
                ValidationRule::unique('equipments')->ignore($this->id)
                ],
            'equipmentName' => 'required',
            'quantity' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'equipment_id.required' => 'Equipment Id is needed',
            'equipmentName.required' => 'Equipment Name is needed',
            'quantity.required' => 'Please input quantity of equipment',
        ];
    }
}
