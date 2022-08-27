<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'character',
        'institution',
        'organization',
        'user_id',
        'organization_id',
        'file',
    ];

    public function products()
    {
        return $this->hasMany('App\Models\SaleProduct', 'sale_id', 'id');
    }

    public function getNumberAttribute()
    {
        return str_pad($this->id, 6, '0', STR_PAD_LEFT);
    }

    public function getYearAttribute()
    {
        return date('Y', strtotime($this->created_at));
    }

}
