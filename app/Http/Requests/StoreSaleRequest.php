<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSaleRequest extends FormRequest
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
            'organization' => 'Jurisdicción',
            'user_id' => 'Usuario',
            'status_id' => 'Estado',
            'organization_id' => 'Organismo',
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
            'organization' => 'min:1',
            "user_id" => 'required',
            "status_id" => 'required',
            "organization_id" => 'required',
            "file" => 'required|min:4|max:100',
        ];

        return $rules;
    }
}
