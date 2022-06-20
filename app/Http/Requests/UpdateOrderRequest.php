<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrderRequest extends FormRequest
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
            "user_id" => 'required',
            "status_id" => 'required',
            "organization_id" => 'required',
            "file" => 'required|min:4|max:100',
        ];

        return $rules;
    }
}
