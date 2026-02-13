<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JobPosition extends Model
{
    use HasFactory;
    use SoftDeletes;

    

    public function areas()
    {
        return $this->belongsToMany(Area::class)->using(AreaEmployee::class);
    }

    public function employees()
    {
        return $this->belongsToMany(Employee::class)->using(AreaEmployee::class);
    }

}
