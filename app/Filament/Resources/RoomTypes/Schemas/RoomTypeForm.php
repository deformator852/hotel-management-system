<?php

declare(strict_types=1);

namespace App\Filament\Resources\RoomTypes\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

final class RoomTypeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                Textarea::make('description')
                    ->columnSpanFull(),
                TextInput::make('max_guests')
                    ->required()
                    ->numeric()
                    ->default(1),
            ]);
    }
}
