<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inventory extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'product_id',
        'organization_id',
        'registration',
        'order_id',
        'sale_id',
        'current_organization',
        'description',
        'observations',
        'status_id',
    ];

    public function getRegistrationAttribute($registration)
    {
        return str_pad($registration, 5, '0', STR_PAD_LEFT);
    }

    public function organization()
    {
        return $this->belongsTo(Organization::class, 'organization_id', 'id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }

    public function status()
    {
        return $this->belongsTo(OrderProductStatus::class, 'status_id', 'id');
    }

}
