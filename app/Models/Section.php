<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Section extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'title',
        'subtitle',
        'description',
        'image',
        'background_color',
        'display_order',
        'is_visible',
        'meta',
    ];

    protected function casts(): array
    {
        return [
            'is_visible' => 'boolean',
            'display_order' => 'integer',
            'meta' => 'array',
        ];
    }

    public function items(): HasMany
    {
        return $this->hasMany(SectionItem::class);
    }
}
