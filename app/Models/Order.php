<?php

namespace App\Models;

use App\Models\Organization;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'character',
        'institution',
        'organization_name',
        'user_id',
        'status_id',
        'organization_id',
        'file',
        'number',
        'year',
    ];

    public const STATUS_PENDING = 1;
    public const STATUS_CONFIRMED = 2;
    public const STATUS_APPROVED = 3;
    public const STATUS_CANCELLED = 4;

    public function organization()
    {
        return $this->belongsTo(Area::class, 'organization_id', 'id');
    }

    public function status()
    {
        return $this->hasOne('App\Models\OrderStatus', 'id', 'status_id');
    }

    public function products()
    {
        return $this->hasMany('App\Models\OrderProduct', 'order_id', 'id');
    }

    public function getAssetsCountAttribute()
    {
        return $this->products()->count();
    }

    /*

    public function getNumberAttribute()
    {
        return str_pad($this->id, 6, '0', STR_PAD_LEFT);
    }

    public function getYearAttribute()
    {
        return date('Y', strtotime($this->created_at));
    }
        */
}
