<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProviderRequest extends FormRequest
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
            'identity' => 'N° de CUIT',
            'name' => 'Nombre',
            'address' => 'Domicilio',
            'email' => 'Correo electrónico',
            'phone' => 'Teléfono',
            'contact_name' => 'Nombre de contacto',
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
            'identity' => 'required|max:191',
            'name' => 'required|min:1',
            'address' => 'max:191',
            'email' => 'max:191',
            "phone" => 'max:191',
            "contact_name" => 'max:191',
        ];

        return $rules;
    }
}
