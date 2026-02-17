<?php

declare(strict_types=1);

namespace App\Models;

use App\RoomStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

final class Room extends Model
{
    protected $fillable = [
        'number',
        'floor',
        'status',
        'beds',
        'area',
        'has_balcony',
        'description',
        'room_type_id',
    ];

    protected $casts = [
        'status' => RoomStatus::class,
    ];

    public function getPhotosPathAttribute(): array
    {
        return $this->photos()->pluck('file_path')->toArray();
    }

    public function photos()
    {
        return $this->hasMany(RoomPhoto::class);
    }

    public function roomType(): BelongsTo
    {
        return $this->belongsTo(RoomType::class);
    }
}
