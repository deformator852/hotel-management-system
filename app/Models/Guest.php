<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Guest extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'phone_secondary',

        'document_type',
        'document_number',

        'date_of_birth',
        'gender',
        'nationality',

        'address',
        'city',
        'country',
        'postal_code',

        'preferences',
        'notes',
        'vip',
    ];
}
