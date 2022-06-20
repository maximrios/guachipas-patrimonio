<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory;

    protected $fillable = [
        'organization_id',
        'code',
        'name',
    ];

    public function getCodeAttribute($code) 
    {
        return str_pad($code, 3, '0', STR_PAD_LEFT);
    }
}
