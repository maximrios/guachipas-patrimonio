<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class DocumentType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'is_required',
        'allowed_mime_types',
        'max_size_mb',
        'is_active',
    ];

    protected $casts = [
        'is_required' => 'boolean',
        'is_active' => 'boolean',
        'allowed_mime_types' => 'array',
    ];

    public const DEFAULT_MIME_TYPES = [
        'application/pdf',
        'image/jpeg',
        'image/png',
        'image/gif',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->slug)) {
                $model->slug = Str::slug($model->name);
            }
        });
    }

    public function documents()
    {
        return $this->hasMany(Document::class, 'document_type_id', 'id');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeRequired($query)
    {
        return $query->where('is_required', true);
    }

    public function getAllowedMimeTypesStringAttribute(): string
    {
        return implode(', ', $this->allowed_mime_types ?? []);
    }

    public function getMaxSizeBytesAttribute(): int
    {
        return $this->max_size_mb * 1024 * 1024;
    }
}
