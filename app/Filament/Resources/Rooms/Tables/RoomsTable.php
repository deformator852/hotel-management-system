<?php

declare(strict_types=1);

namespace App\Filament\Resources\Rooms\Tables;

use App\RoomStatus;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

final class RoomsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('number')
                    ->searchable(),
                TextColumn::make('floor')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('status')
                    ->badge()
                    ->searchable()
                    ->color(fn (RoomStatus $state): string => match ($state) {
                        RoomStatus::Available => 'success',
                        RoomStatus::Occupied => 'warning',
                        RoomStatus::Maintenance => 'danger',
                        RoomStatus::Blocked => 'secondary',
                    }),
                TextColumn::make('beds')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('area')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('roomType.name')
                    ->label('Room Type')
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([
                SelectFilter::make('has_balcony')
                    ->label('Balcony')
                    ->options([
                        1 => 'Yes',
                        0 => 'No',
                    ]),            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
