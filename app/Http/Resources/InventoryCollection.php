<?php

namespace App\Http\Resources;

use App\Http\Resources\InventoryResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class InventoryCollection extends ResourceCollection
{

    public $collects = InventoryResource::class;

    public function toArray($request)
    {
        return [
            'data' => $this->collection,
        ];
    }
}
