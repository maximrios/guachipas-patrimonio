<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
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
    public function attributes()
    {
        return [
            'character' => 'Caracter',
            'institution' => 'Institucion',
            'area_name' => 'Jurisdicción',
            'user_id' => 'Usuario',
            'status_id' => 'Estado',
            'area_id' => 'Organismo',
            "file" => 'Expediente',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        
        $rules = [
            'character' => 'min:1',
            'institution' => 'min:1',
            'area_name' => 'min:1',
            "user_id" => 'sometimes',
            "status_id" => 'sometimes',
            "area_id" => 'sometimes',
            "file" => '',
        ];

        return $rules;
    }
}
