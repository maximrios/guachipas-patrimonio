<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSaleProductRequest extends FormRequest
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
            'sale_id' => 'Baja',
            'product_id' => 'Matrícula',
            'quantity' => 'Cantidad',
            'description' => 'Descripcion',
            'sale_product_status_id' => 'Estado',
            'sale_product_reason_id' => 'Motivo de baja',
            'registration_from' => 'Matricula desde',
            'registration_to' => 'Matricula hasta',
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
            'sale_id' => 'required',
            'product_id' => 'required',
            'quantity' => 'required',
            'description' => 'required',
            'sale_product_status_id' => 'required',
            'sale_product_reason_id' => 'required',
            'registration_from' => 'required',
            'registration_to' => 'required',
        ];

        return $rules;
    }
}
