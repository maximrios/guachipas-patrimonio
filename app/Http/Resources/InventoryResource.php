<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InventoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'registration' => $this->registration,
            'nomenclator' => $this->product->nomenclator,
            'product' => $this->product->name,
            'description' => $this->description,
            'organization' => $this->organization->name,
            'status' => $this->status->name,
            'order' => $this->order,
            'saleId' => $this->sale->id ?? 0,
        ];
    }
}
