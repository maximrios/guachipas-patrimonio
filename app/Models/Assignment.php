<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;

    protected $fillable = [
        'assign_to',
        'organization_id',
        'observation',
        'approved_at',
    ];

    public function organization()
    {
        return $this->belongsTo(Organization::class, 'organization_id', 'id');
    }

    public function products()
    {
        return $this->hasMany(AssignmentProduct::class, 'assignment_id', 'id');
    }
}
