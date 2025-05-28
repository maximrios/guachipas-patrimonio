<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAttributeValue extends Model
{
    use HasFactory;

    protected $fillable = [
        'inventory_id',
        'attribute_id',
        'value',
        'option_id',
    ];

    public function inventory()
    {
        return $this->belongsTo(Inventory::class);
    }

    public function attribute()
    {
        return $this->belongsTo(Attribute::class);
    }
}
