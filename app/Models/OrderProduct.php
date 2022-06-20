<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'product_id',
        'order_product_status_id',
        'order_product_origin_id',
        'valuation',
        'quantity',
        'description',
        'registration_from',
        'registration_to',
        'section',
        'subsection',
        'invoice',
        'order_payment',
        'unit_price',
        'total_price',
    ];
    
    public function order()
    {
        return $this->belongsTo('App\Models\Order', 'order_id', 'id');
    }

    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'product_id', 'id');
    }

    public function origin()
    {
        return $this->belongsTo('App\Models\OrderProductOrigin', 'order_product_origin_id', 'id');
    }

    public function status()
    {
        return $this->belongsTo('App\Models\OrderProductStatus', 'order_product_status_id', 'id');
    }
}
