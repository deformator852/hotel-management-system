<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

final class RoomType extends Model
{
    protected $fillable = [
        'name',
        'description',
        'max_guests',
    ];
}
