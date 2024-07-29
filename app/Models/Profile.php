<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'identity',
        'first_name',
        'last_name',
        'email',
    ];

    protected $connection = 'personal';

    public function getNameAttribute()
    {
        return $this->first_name.' '.$this->last_name;
    }
    
    public function getFullNameAttribute()
    {
        return $this->first_name.' '.$this->last_name;
    }
}
