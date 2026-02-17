<?php

declare(strict_types=1);

namespace App;

enum RoomStatus: string
{
    case Available = 'available';
    case Occupied = 'occupied';
    case Maintenance = 'maintenance';
    case Blocked = 'blocked';
}
