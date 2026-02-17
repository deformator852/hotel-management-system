<?php

declare(strict_types=1);

namespace App\Filament\Resources\RoomTypes\Pages;

use App\Filament\Resources\RoomTypes\RoomTypeResource;
use Filament\Resources\Pages\CreateRecord;

final class CreateRoomType extends CreateRecord
{
    protected static string $resource = RoomTypeResource::class;
}
