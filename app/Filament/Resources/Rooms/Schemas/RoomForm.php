<?php

namespace App\Filament\Resources\Rooms\Schemas;

use App\RoomStatus;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class RoomForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('number')
                    ->required(),
                TextInput::make('floor')
                    ->required()
                    ->numeric(),
                Select::make('status')
                    ->options(RoomStatus::class)
                    ->required(),
                TextInput::make('beds')
                    ->required()
                    ->numeric(),
                TextInput::make('area')
                    ->required()
                    ->numeric(),
                Toggle::make('has_balcony')
                    ->required(),
                Textarea::make('description')
                    ->columnSpanFull(),
                Select::make('room_type_id')
                    ->label("Room type")
                    ->relationship('roomType', 'name')
                    ->required()
            ]);
    }
}
