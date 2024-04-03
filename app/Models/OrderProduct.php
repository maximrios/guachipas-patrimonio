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
        'order_product_found_id',
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
        'date_invoice',
        'order_payment',
        'provider_id',
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

    public function found()
    {
        return $this->belongsTo('App\Models\OrderProductFound', 'order_product_found_id', 'id');
    }

    public function provider()
    {
        return $this->belongsTo('App\Models\Provider', 'provider_id', 'id');
    }

    public function getRegistrationFromAttribute($registration_from)
    {
        return str_pad($registration_from, 9, '0', STR_PAD_LEFT);
    }

    public function getRegistrationToAttribute($registration_to)
    {
        return str_pad($registration_to, 9, '0', STR_PAD_LEFT);
    }
}
