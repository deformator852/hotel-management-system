<?php

declare(strict_types=1);

namespace App\Filament\Resources\Reservations\Schemas;

use App\Models\Guest;
use App\ReservationStatus;
use Carbon\Carbon;
use Filament\Actions\Action;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ReservationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('guest_id')
                    ->label('Guest')
                    ->options(function () {
                        return Guest::all()->mapWithKeys(fn ($guest) => [
                            $guest->id => "{$guest->first_name} {$guest->last_name} {$guest->phone}",
                        ])->toArray();
                    })
                    ->searchable()
                    ->preload()
                    ->required()
                    ->disabled(fn ($record) => $record !== null),
                //                Select::make('guest_id')
                //                    ->label('Guest')
                //                    ->options(function () {
                //                        return Guest::all()->mapWithKeys(fn ($guest) => [
                //                            $guest->id => "{$guest->first_name} {$guest->last_name} {$guest->phone}",
                //                        ])->toArray();
                //                    })
                //                    ->searchable()
                //                    ->preload()
                //                    ->required(),
                DatePicker::make('check_in_date')
                    ->label('Check-in Date')
                    ->minDate(Carbon::today())
                    ->reactive()
                    ->required(),

                DatePicker::make('check_out_date')
                    ->label('Check-out Date')
                    ->minDate(fn ($get) => $get('check_in_date')
                        ? Carbon::parse($get('check_in_date'))->addDay()
                        : Carbon::tomorrow()
                    )
                    ->required(),
                Select::make('rooms')
                    ->label('Room')
                    ->relationship('rooms', 'number')
                    ->required()
                    ->preload()
                    ->searchable()  // ← добавь это
                    ->suffixAction(
                        Action::make('view_room')
                            ->icon('heroicon-o-arrow-top-right-on-square')
                            ->tooltip('View room')
                            ->url(fn ($get) => $get('rooms')
                                ? route('filament.admin.resources.rooms.view', ['record' => $get('rooms')])
                                : null
                            )
                            ->openUrlInNewTab()
                            ->visible(fn ($get) => filled($get('rooms')))
                    ),
                TextInput::make('number_of_guests')
                    ->required()
                    ->numeric(),
                Select::make('status')
                    ->options([
                        'Pending' => ReservationStatus::Pending->value,
                        'Confirmed' => ReservationStatus::Confirmed->value,
                        'Checked in' => ReservationStatus::CheckedIn->value,
                        'Checked out' => ReservationStatus::CheckedOut->value,
                        'Cancelled' => ReservationStatus::Cancelled->value,
                    ])
                    ->default('Pending')
                    ->required(),
                Textarea::make('special_requests')
                    ->columnSpanFull(),

            ]);
    }
}
