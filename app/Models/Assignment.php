<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\Assign;

class Assignment extends Model
{
    use HasFactory;

    protected $fillable = [
        'assign_to',
        'organization_id',
        'inventory_id',
        'observation',
        'approved_at',
        'area_id',
        'employee_id',
    ];

    public static function boot() {
        parent::boot();
        static::created(function (Assignment $model) {
            $inventory = Inventory::find($model->inventory_id);
            if ($inventory) {
                $inventory->area_id = $model->area_id;
                $inventory->employee_id = $model->employee_id;
                if ($model->employee_id) {
                    $inventory->available = 0;
                } else {
                    $inventory->available = 1;
                }
                $inventory->save();
            }
        });
    }

    public function organization()
    {
        return $this->belongsTo(Organization::class, 'organization_id', 'id');
    }

    public function products()
    {
        return $this->hasMany(AssignmentProduct::class, 'assignment_id', 'id');
    }

    public function inventory()
    {
        return $this->belongsTo(Inventory::class, 'inventory_id', 'id');
    }

    public function area()
    {
        return $this->belongsTo(Area::class, 'area_id', 'id')->withTrashed();
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'id')->withTrashed();
    }
}
