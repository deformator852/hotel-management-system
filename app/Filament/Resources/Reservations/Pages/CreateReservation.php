<?php

declare(strict_types=1);

namespace App\Filament\Resources\Reservations\Pages;

use App\Filament\Resources\Reservations\ReservationResource;
use App\Models\Room;
use Filament\Resources\Pages\CreateRecord;

class CreateReservation extends CreateRecord
{
    protected static string $resource = ReservationResource::class;

    protected function afterCreate(): void
    {
        $roomId = $this->form->getState()['rooms'];
        $room = Room::find($roomId);

        $this->record->rooms()->attach($room->id, [
            'price_per_night' => $room->price,
        ]);

        $this->record->total_amount = $this->record->rooms->sum(fn ($r) => $r->pivot->subtotal);
        $this->record->save();
    }
}
