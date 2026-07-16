<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'artist_id',
        'service_type',
        'name',
        'email',
        'phone',
        'booking_date',
        'booking_time',
        'design_description',
        'placement',
        'size',
        'status',
        'whatsapp_sent_at',
        'notes',
    ];

    protected function casts(): array
    {
        return [
            'booking_date' => 'date',
            'booking_time' => 'datetime:H:i',
            'whatsapp_sent_at' => 'datetime',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function artist(): BelongsTo
    {
        return $this->belongsTo(ArtistProfile::class, 'artist_id');
    }

    public function services(): HasMany
    {
        return $this->hasMany(BookingService::class);
    }
}
