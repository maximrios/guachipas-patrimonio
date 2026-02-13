<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryMaintenance extends Model
{
    use HasFactory;

    protected $fillable = [
        'inventory_id',
        'maintenance_type_id',
        'description',
        'maintenance_date',
        'next_maintenance_date',
        'cost',
    ];

    protected $casts = [
        'maintenance_date' => 'date',
        'next_maintenance_date' => 'date',
        'cost' => 'decimal:2',
    ];

    public function inventory()
    {
        return $this->belongsTo(Inventory::class, 'inventory_id', 'id');
    }

    public function maintenanceType()
    {
        return $this->belongsTo(MaintenanceType::class, 'maintenance_type_id', 'id');
    }
}
