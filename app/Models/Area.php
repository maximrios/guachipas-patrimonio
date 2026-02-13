<?php

namespace App\Models;

use Kalnoy\Nestedset\NodeTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Area extends Model
{
    use HasFactory;
    use NodeTrait;
    use SoftDeletes;

    //TODO add this value on .env file
    public const PARENTUSI = 68;
    public const DESKTOP = 42;

    protected $fillable = [
        'name',
        'code',
        'parent_id',
        'audits',
        'type',
        'siga_id',
    ];

    public function getAncestorsAttribute()
    {
        return $this->ancestorsAndSelf($this->id);
    }

    public function getBreadcrumbAttribute()
    {
        $ancestors = $this->getAncestorsAttribute()->pluck('name')->toArray();
        return implode(' - ', $ancestors);
    }

    public function positions()
    {
        return $this->belongsToMany(JobPosition::class)->using(AreaEmployee::class);
    }

    public function employees()
    {
        //return $this->belongsToMany(Employee::class)->using(AreaEmployee::class);
        return $this->hasManyThrough(Employee::class, AreaEmployee::class, 'area_id', 'id', 'id', 'employee_id');
    }

    public function getResponsibleAttribute()
    {
        return $this->employees()
            ->where('job_position_id', $this->position)
            ->where('current', 1)
            ->first();
    }
}
