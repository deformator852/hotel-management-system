<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

final class RoomPhoto extends Model
{
    protected $fillable = ['file_path', 'caption', 'sort_order'];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
