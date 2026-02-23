<?php

declare(strict_types=1);

namespace App\Filament\Resources\Reservations\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ReservationInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('reservation_number'),
                TextEntry::make('guest.first_name')
                    ->label('Guest')
                    ->getStateUsing(fn ($record) => "{$record->guest->first_name} {$record->guest->last_name} ({$record->guest->phone})")
                    ->url(static fn ($record) => route('filament.admin.resources.guests.view', $record->guest->id))
                    ->numeric(),
                TextEntry::make('check_in_date')
                    ->date(),
                TextEntry::make('check_out_date')
                    ->date(),
                TextEntry::make('number_of_nights')
                    ->numeric(),
                TextEntry::make('number_of_guests')
                    ->numeric(),
                TextEntry::make('status')
                    ->badge(),
                TextEntry::make('rooms.price')
                    ->label('Price per night')
                    ->numeric(),
                TextEntry::make('total_amount')
                    ->label('Total Amount')
                    ->numeric(),
                TextEntry::make('paid_amount')
                    ->numeric(),
                TextEntry::make('special_requests')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('created_by')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('cancelled_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('cancellation_reason')
                    ->placeholder('-')
                    ->columnSpanFull(),
            ]);
    }
}
