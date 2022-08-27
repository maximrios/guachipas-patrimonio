<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAssignmentRequest extends FormRequest
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
            "assign_to" => 'Dirigido',
            'organization_id' => 'Organismo',
            "observation" => 'Observacion',
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
            'assign_to' => 'min:1',
            "organization_id" => 'required',
            "observation" => 'sometimes',
        ];

        return $rules;
    }
}
