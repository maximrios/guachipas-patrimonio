<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory;
    use SoftDeletes;

    
    protected $table = 'employees';

    protected $fillable = [
        'profile_id',
        'user_id',
        'addmission_date',
        'license_date',
    ];

    /*
    public function area()
    {
        return $this->belongsTo(Area::class, 'area_id', 'id');
    }
    */

    public function profile()
    {
        return $this->hasOne(Profile::class, 'id', 'profile_id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function audits()
    {
        return $this->belongsToMany(AuditPlan::class, 'audit_employees', 'employee_id', 'audit_plan_id')
            ->wherePivot('deleted_at', NULL)
            ->orderBy('id', 'DESC');
    }

    /**
     * The users that belong to the role.
     */
    public function positions()
    {
        return $this->belongsToMany(AuditPosition::class, 'audit_employees', 'employee_id', 'audit_position_id')
            ->wherePivot('deleted_at', NULL);;
    }

    public function areas()
    {
        return $this->belongsToMany(Area::class)->using(AreaEmployee::class);
    }

    public function jobPositions()
    {
        return $this->belongsToMany(JobPosition::class, 'area_employees')->using(AreaEmployee::class);
    }

    public function areaEmployees()
    {
        return $this->hasMany(AreaEmployee::class, 'employee_id', 'id');
    }

    public function licenses()
    {
        return $this->hasMany(License::class, 'employee_id', 'id');
    }

    public function current()
    {
        return $this->hasOne(AreaEmployee::class)->where('current', true);
    }

    /*public function area()
    {
        return $this->hasOneThrough(Area::class, AreaEmployee::class, 'area_id', 'id')->where('current', true);
    }*/
    

    public function area()
    {
        return $this->hasManyThrough(Area::class, AreaEmployee::class, 'employee_id', 'id', 'id', 'area_id')
            ->where('current', true);
    }
    

    public function position()
    {
        return $this->hasManyThrough(JobPosition::class, AreaEmployee::class, 'employee_id', 'id', 'id', 'job_position_id')
            ->where('current', true);
    }

    

}
