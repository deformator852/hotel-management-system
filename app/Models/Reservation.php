<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Reservation extends Model
{
    protected static function booted(): void
    {
        static::creating(static function ($reservation): void {
            if (! $reservation->reservation_number) {
                $reservation->reservation_number = (string) Str::uuid();
            }
        });
    }
}
