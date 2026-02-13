<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaintenanceType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function maintenances()
    {
        return $this->hasMany(InventoryMaintenance::class, 'maintenance_type_id', 'id');
    }
}
