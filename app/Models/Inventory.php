<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inventory extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'order_product_id',
        'product_id',
        'organization_id',
        'registration',
        'order_id',
        'sale_id',
        'current_organization',
        'description',
        'observations',
        'status_id',
        'available',
        'area_id',
    ];

    public const AVAILABLE = [
        '0' => 'No disponible',
        '1' => 'Disponible',
    ];

    public function getRegistrationAttribute($registration)
    {
        return str_pad($registration, 9, '0', STR_PAD_LEFT);
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

    //last assignment
    public function area()
    {
        return $this->belongsTo(Area::class, 'area_id', 'id');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'id');
    }

    public function assignments()
    {
        return $this->hasMany(Assignment::class, 'inventory_id', 'id')->orderBy('created_at', 'desc');
    }

    public function provider()
    {
        return $this->hasOneThrough(
            Provider::class,
            OrderProduct::class,
            'id', // Foreign key on OrderProduct
            'id', // Foreign key on Supplier
            'order_product_id', // Local key on Inventory
            'provider_id' // Local key on OrderProduct
        );
    }

}
