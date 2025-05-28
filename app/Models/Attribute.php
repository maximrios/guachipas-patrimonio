<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'icon',
        'type',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($attribute) {
            // Automatically generate slug if not provided
            if (empty($attribute->slug)) {
                $attribute->slug = \Str::slug($attribute->name, '-');
            }
        }); 

        // static::deleting(function ($attribute) {
        //     // Delete related product attributes
        //     $attribute->productAttributes()->delete();
        // });
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_attributes');
    }
}
