<?php

declare(strict_types=1);

namespace App\Filament\Resources\Reservations\Pages;

use App\Filament\Resources\Reservations\ReservationResource;
use App\Models\Room;
use Filament\Resources\Pages\CreateRecord;

class CreateReservation extends CreateRecord
{
    protected static string $resource = ReservationResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        unset($data['room_id']);

        return $data;
    }

    protected function afterCreate(): void
    {
        $roomId = $this->form->getState()['room_id'];

        $room = Room::find($roomId);

        $this->record->rooms()->attach($room->id, [
            'price_per_night' => $room->price,
            'number_of_nights' => $this->record->number_of_nights,
            'subtotal' => $room->price * $this->record->number_of_nights,
        ]);

        $this->record->total_amount =
            $this->record->rooms->sum(fn ($r) => $r->pivot->subtotal);
        $this->record->save();
    }
}
