<?php

declare(strict_types=1);

namespace App;

enum DocumentType: string
{
    case Passport = 'Passport';
    case IdCard = 'Id card';
    case DriversLicense = 'Drivers license';
}
