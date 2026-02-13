<?php

namespace App;

enum RoomStatus:string
{
    case AVAILABLE = "available";
    case OCCUPIED = "occupied";
    case MAINTENANCE = "maintenance";
    case BLOCKED = "blocked";
}
