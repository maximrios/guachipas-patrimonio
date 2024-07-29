<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AreaEmployee extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $connection = 'personal';

    protected $fillable = [
        'area_id',
        'employee_id',
        'job_position_id',
    ];

    public function scopeSyndic($query)
    {
        return $query->where('job_position_id', 1)->first();
    }

    public function area()
    {
        return $this->belongsTo(Area::class, 'area_id', 'id');
    }

    public function jobPosition()
    {
        return $this->belongsTo(JobPosition::class, 'job_position_id', 'id');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'id');
    }
}
