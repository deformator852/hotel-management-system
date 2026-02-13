<?php

namespace App\Models;

use App\RoomStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Room extends Model
{
    protected $fillable = [
        'number',
        'floor',
        'status',
        'beds',
        'area',
        'has_balcony',
        'description',
    ];

    public function roomType(): BelongsTo
    {
        return $this->belongsTo(RoomType::class);
    }

    protected $casts = [
        "status" => RoomStatus::class
    ];
}
