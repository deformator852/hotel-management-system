<?php

declare(strict_types=1);

namespace App;

enum ReservationStatus: string
{
    case Pending = 'Pending';
    case Confirmed = 'Confirmed';
    case CheckedIn = 'Checked in';
    case CheckedOut = 'Checked out';
    case Cancelled = 'Cancelled';
}
