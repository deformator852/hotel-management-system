<?php

declare(strict_types=1);

namespace App\Filament\Resources\Guests\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class GuestForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('first_name')
                    ->required(),
                TextInput::make('last_name')
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required(),
                TextInput::make('phone')
                    ->tel()
                    ->required(),
                TextInput::make('phone_secondary')
                    ->tel(),
                Select::make('document_type')
                    ->options(['Passport' => 'Passport', 'Id card' => 'Id card', 'Drivers license' => 'Drivers license'])
                    ->required(),
                TextInput::make('document_number')
                    ->required(),
                DatePicker::make('date_of_birth'),
                Select::make('gender')
                    ->options(['male' => 'Male', 'female' => 'Female', 'other' => 'Other']),
                TextInput::make('nationality'),
                TextInput::make('address'),
                TextInput::make('city'),
                TextInput::make('country'),
                TextInput::make('postal_code'),
                Textarea::make('preferences')
                    ->columnSpanFull(),
                Textarea::make('notes')
                    ->columnSpanFull(),
                Toggle::make('vip')
                    ->required(),
                Toggle::make('blacklisted')
                    ->required(),
                Textarea::make('blacklist_reason')
                    ->columnSpanFull(),
            ]);
    }
}
