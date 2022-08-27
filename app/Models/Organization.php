<?php

namespace App\Models;

use Kalnoy\Nestedset\NodeTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Organization extends Model
{
    use HasFactory, NodeTrait;

    protected $fillable = [
        'code',
        'name',
        'parent_id',
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

    public function getCodeAttribute($code) 
    {
        return str_pad($code, 3, '0', STR_PAD_LEFT);
    }
    
}
