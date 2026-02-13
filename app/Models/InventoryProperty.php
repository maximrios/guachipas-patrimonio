<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryProperty extends Model
{
    use HasFactory;

    protected $fillable = [
        'inventory_id',
        'property_type',
        'address',
        'locality',
        'cadastral_number',
        'parcel',
        'deed_number',
        'deed_date',
        'acquisition_type',
        'acquisition_value',
        'valuation_type',
        'valuation_value',
        'use_type',
    ];

    protected $casts = [
        'deed_date' => 'date',
        'acquisition_value' => 'decimal:2',
        'valuation_value' => 'decimal:2',
    ];

    public const PROPERTY_TYPES = [
        'terreno' => 'Terreno',
        'edificio' => 'Edificio',
        'oficina' => 'Oficina',
    ];

    public const ACQUISITION_TYPES = [
        'compra' => 'Compra',
        'donacion' => 'Donación',
        'cesion' => 'Cesión',
    ];

    public const VALUATION_TYPES = [
        'fiscal' => 'Fiscal',
        'compra' => 'Compra',
        'tasacion' => 'Tasación',
    ];

    public const USE_TYPES = [
        'administrativo' => 'Administrativo',
        'salud' => 'Salud',
        'educacion' => 'Educación',
        'seguridad' => 'Seguridad',
        'otro' => 'Otro',
    ];

    public function inventory()
    {
        return $this->belongsTo(Inventory::class, 'inventory_id', 'id');
    }
}
