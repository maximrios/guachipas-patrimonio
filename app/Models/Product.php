<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $appends = ['nomenclator'];

    public function order()
    {
        return $this->hasMany('App\Models\OrderProduct', 'product_id', 'id');
    }

    public function attributes()
    {
        return $this->belongsToMany(Attribute::class, 'product_attributes');
    }

    // Product.php
    public function attributeValues()
    {
        return $this->hasMany(ProductAttributeValue::class);
    }

    public function getTypeAttribute($type)
    {
        return str_pad($type, 2, '0', STR_PAD_LEFT);
    }

    public function getGroupAttribute($group)
    {
        return str_pad($group, 2, '0', STR_PAD_LEFT);
    }

    public function getSubgroupAttribute($subgroup)
    {
        return str_pad($subgroup, 2, '0', STR_PAD_LEFT);
    }

    public function getAccountAttribute($acount)
    {
        return str_pad($acount, 2, '0', STR_PAD_LEFT);
    }

    public function getSpeciesAttribute($species)
    {
        return str_pad($species, 3, '0', STR_PAD_LEFT);
    }

    public function getSubspeciesAttribute($subspecies)
    {
        return str_pad($subspecies, 2, '0', STR_PAD_LEFT);
    }

    public function getNomenclatorAttribute()
    {
        return $this->type.$this->group.$this->subgroup.$this->account.$this->species.$this->subspecies;
    }
}
