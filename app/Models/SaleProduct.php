<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'sale_id',
        'inventory_id',
        'sale_product_status_id',
        'sale_product_reason_id',
        'quantity',
        'description',
        'section',
        'subsection',
    ];
    
    public function sale()
    {
        return $this->belongsTo('App\Models\Sale', 'sale_id', 'id');
    }

    public function inventory()
    {
        return $this->belongsTo(Inventory::class, 'inventory_id', 'id')->withTrashed();
    }

    public function reason()
    {
        return $this->belongsTo('App\Models\SaleProductReason', 'sale_product_reason_id', 'id');
    }

    public function status()
    {
        return $this->belongsTo('App\Models\SaleProductStatus', 'sale_product_status_id', 'id');
    }

}
