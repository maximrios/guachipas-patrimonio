<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateDocumentTypeRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'slug' => [
                'nullable',
                'string',
                'max:255',
                Rule::unique('document_types', 'slug')->ignore($this->document_type),
            ],
            'description' => 'nullable|string',
            'is_required' => 'nullable|boolean',
            'allowed_mime_types' => 'nullable|string',
            'max_size_mb' => 'nullable|integer|min:1|max:100',
            'is_active' => 'nullable|boolean',
        ];
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'is_required' => $this->has('is_required'),
            'is_active' => $this->has('is_active'),
        ]);
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'name' => 'nombre',
            'slug' => 'slug',
            'description' => 'descripción',
            'is_required' => 'obligatorio',
            'allowed_mime_types' => 'tipos MIME permitidos',
            'max_size_mb' => 'tamaño máximo',
            'is_active' => 'activo',
        ];
    }
}
