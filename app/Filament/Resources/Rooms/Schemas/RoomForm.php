<?php

declare(strict_types=1);

namespace App\Filament\Resources\Rooms\Schemas;

use App\RoomStatus;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Schema;

final class RoomForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Group::make([
                    Select::make('room_type_id')
                        ->label('Room type')
                        ->relationship('roomType', 'name')
                        ->required(),
                    TextInput::make('number')
                        ->required(),
                    TextInput::make('floor')
                        ->required()
                        ->numeric(),
                    TextInput::make('price')
                        ->label('Price per Night')
                        ->numeric()
                        ->required()
                        ->suffix('€'),
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
                ])->columns(3),

                Group::make([
                    Repeater::make('photos')
                        ->label('Room Photos')
                        ->relationship('photos')
                        ->schema([
                            FileUpload::make('file_path')
                                ->label('Photo')
                                ->image()
                                ->required(),

                            TextInput::make('caption')
                                ->label('Caption')
                                ->nullable(),

                            TextInput::make('sort_order')
                                ->label('Order')
                                ->numeric()
                                ->default(0),
                        ])
                        ->columns(1)
                        ->orderColumn('sort_order')
                        ->collapsible()
                        ->grid(2)
                        ->addActionLabel('Add Photo'),
                ])->columnSpanFull(),
            ]);
    }
}
