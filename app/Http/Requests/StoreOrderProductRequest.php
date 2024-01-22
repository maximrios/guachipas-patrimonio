<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderProductRequest extends FormRequest
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
            'order_id' => 'Usuario',
            'product_id' => 'Clasificación',
            'order_product_found_id' => 'Fondo',
            'order_product_status_id' => 'Estado',
            'order_product_origin_id' => 'Procedencia',
            'valuation' => 'Método de valuación',
            'quantity' => 'Cantidad',
            'description' => 'Descripcion',
            'section' => 'Seccion',
            'subsection' => 'Subseccion',
            'invoice' => 'Factura',
            'date_invoice' => 'Fecha de factura',
            'order_payment' => 'Orden de pago',
            'provider_id' => 'Proveedor',
            'unit_price' => 'Precio unitario',
            'total_price' => 'Precio total',
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
            'order_id' => 'required',
            'product_id' => 'required',
            'order_product_found_id' => 'required',
            'order_product_status_id' => 'required',
            'order_product_origin_id' => 'required',
            'valuation' => 'required',
            'quantity' => 'required',
            'description' => 'required',
            'section' => 'required',
            'subsection' => 'required',
            'invoice' => 'required',
            'date_invoice' => 'required',
            'order_payment' => 'required',
            'provider_id' => 'required',
            'unit_price' => 'required',
            'total_price' => 'required',
        ];

        return $rules;
    }
}
