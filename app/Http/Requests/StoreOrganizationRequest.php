<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrganizationRequest extends FormRequest
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
            'parent_id' => 'Organismo',
            'code' => 'Código',
            'sector' => 'Sector',
            "name" => 'Unidad Organizacional',
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
            "parent_id" => 'required',
            'code' => 'required',
            'sector' => 'required',
            "name" => 'required|min:4|max:100',
        ];

        return $rules;
    }
}
