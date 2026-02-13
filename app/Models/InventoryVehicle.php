<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryVehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'inventory_id',
        'vehicle_type',
        'brand',
        'model',
        'year',
        'plate',
        'engine_number',
        'chassis_number',
        'color',
        'acquisition_type',
        'acquisition_date',
        'acquisition_value',
        'valuation_type',
        'valuation_value',
        'operational_status',
    ];

    protected $casts = [
        'acquisition_date' => 'date',
        'acquisition_value' => 'decimal:2',
        'valuation_value' => 'decimal:2',
    ];

    public const VEHICLE_TYPES = [
        'auto' => 'Auto',
        'camioneta' => 'Camioneta',
        'maquinaria' => 'Maquinaria',
        'motocicleta' => 'Motocicleta',
        'camion' => 'Camión',
    ];

    public const OPERATIONAL_STATUSES = [
        'operativo' => 'Operativo',
        'reparacion' => 'En Reparación',
        'baja' => 'Baja',
    ];

    public const ACQUISITION_TYPES = [
        'compra' => 'Compra',
        'donacion' => 'Donación',
        'cesion' => 'Cesión',
        'transferencia' => 'Transferencia',
    ];

    public const VALUATION_TYPES = [
        'compra' => 'Compra',
        'tasacion' => 'Tasación',
        'libro' => 'Valor en Libros',
    ];

    public function inventory()
    {
        return $this->belongsTo(Inventory::class, 'inventory_id', 'id');
    }
}
