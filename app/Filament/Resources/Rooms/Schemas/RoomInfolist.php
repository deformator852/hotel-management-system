<?php

declare(strict_types=1);

namespace App\Filament\Resources\Rooms\Schemas;

use Alsaloul\ImageGallery\Infolists\Entries\ImageGalleryEntry;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

final class RoomInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('number'),
                TextEntry::make('floor')
                    ->numeric(),
                TextEntry::make('status')
                    ->badge(),
                TextEntry::make('beds')
                    ->numeric(),
                TextEntry::make('area')
                    ->numeric(),
                IconEntry::make('has_balcony')
                    ->boolean(),
                TextEntry::make('description')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('roomType.name')->label('Room Type'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
                ImageGalleryEntry::make('photosPath')
                    ->label('Photos')
                    ->disk(config('filesystems.default'))
                    ->visibility('private')
                    ->thumbWidth(128)
                    ->thumbHeight(128)
                    ->imageGap('gap-4'),
            ]);
    }
}
