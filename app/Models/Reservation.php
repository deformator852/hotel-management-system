<?php

declare(strict_types=1);

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class Reservation extends Model
{
    protected $fillable = [
        'guest_id',
        'check_in_date',
        'check_out_date',
        'number_of_nights',
        'number_of_guests',
        'status',
        'total_amount',
        'paid_amount',
        'special_requests',
        'created_by',
        'cancelled_at',
        'cancellation_reason',
    ];

    public function guest(): BelongsTo
    {
        return $this->belongsTo(Guest::class);
    }

    public function rooms(): BelongsToMany
    {
        return $this->belongsToMany(Room::class, 'reservation_rooms');
    }

    protected static function booted(): void
    {
        static::saving(static function (Reservation $reservation): void {
            if ($reservation->check_in_date < Carbon::today()->toDateString()) {
                throw ValidationException::withMessages([
                    'check_in_date' => 'Check-in date cannot be in the past.',
                ]);
            }

            if ($reservation->check_out_date < $reservation->check_in_date) {
                throw ValidationException::withMessages([
                    'check_out_date' => 'Check-out date cannot be before check-in date.',
                ]);
            }

            if ($reservation->check_in_date && $reservation->check_out_date) {
                $checkIn = Carbon::parse($reservation->check_in_date);
                $checkOut = Carbon::parse($reservation->check_out_date);
                $reservation->number_of_nights = $checkIn->diffInDays($checkOut);
            }
            Log::info($reservation);
            if ($reservation->room_id && $reservation->number_of_nights) {
                $room = Room::find($reservation->room_id);
                if ($room) {
                    $reservation->total_amount = $reservation->number_of_nights * $room->price;
                }
            }
        });

        static::creating(static function (Reservation $reservation) {
            if (! $reservation->reservation_number) {
                $reservation->reservation_number = (string) Str::uuid();
            }
        });
    }
}
