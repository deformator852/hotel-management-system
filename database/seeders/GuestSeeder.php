<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\DocumentType;
use App\Models\Guest;
use Illuminate\Database\Seeder;

class GuestSeeder extends Seeder
{
    public function run(): void
    {
        $guests = [
            [
                'first_name' => 'John',
                'last_name' => 'Smith',
                'email' => 'john.smith@example.com',
                'phone' => '+491701234567',
                'phone_secondary' => null,
                'document_type' => DocumentType::Passport->value,
                'document_number' => 'P12345678',
                'date_of_birth' => '1990-05-12',
                'gender' => 'male',
                'nationality' => 'Ukrainian',
                'address' => 'Alexanderplatz 1',
                'city' => 'Berlin',
                'country' => 'Ukraine',
                'postal_code' => '10178',
                'preferences' => 'High floor room',
                'notes' => null,
                'vip' => true,
                'blacklisted' => false,
                'blacklist_reason' => null,
            ],
            [
                'first_name' => 'Anna',
                'last_name' => 'Müller',
                'email' => 'anna.mueller@example.com',
                'phone' => '+491702345678',
                'phone_secondary' => null,
                'document_type' => DocumentType::IdCard->value,
                'document_number' => 'ID98765432',
                'date_of_birth' => '1985-09-23',
                'gender' => 'female',
                'nationality' => 'Germany',
                'address' => 'Marienplatz 5',
                'city' => 'Munich',
                'country' => 'Germany',
                'postal_code' => '80331',
                'preferences' => 'Late check-in',
                'notes' => 'Frequent guest',
                'vip' => false,
                'blacklisted' => false,
                'blacklist_reason' => null,
            ],
            [
                'first_name' => 'Michael',
                'last_name' => 'Brown',
                'email' => 'michael.brown@example.com',
                'phone' => '+491703456789',
                'phone_secondary' => null,
                'document_type' => DocumentType::IdCard->value,
                'document_number' => 'P87654321',
                'date_of_birth' => '1995-01-10',
                'gender' => 'male',
                'nationality' => 'USA',
                'address' => 'Main Street 12',
                'city' => 'Hamburg',
                'country' => 'Germany',
                'postal_code' => '20095',
                'preferences' => null,
                'notes' => null,
                'vip' => false,
                'blacklisted' => false,
                'blacklist_reason' => null,
            ],
            [
                'first_name' => 'Sophia',
                'last_name' => 'Rossi',
                'email' => 'sophia.rossi@example.com',
                'phone' => '+491704567890',
                'phone_secondary' => null,
                'document_type' => DocumentType::Passport->value,
                'document_number' => 'P11223344',
                'date_of_birth' => '1992-07-18',
                'gender' => 'female',
                'nationality' => 'Italy',
                'address' => 'Via Roma 8',
                'city' => 'Frankfurt',
                'country' => 'Germany',
                'postal_code' => '60311',
                'preferences' => 'Vegetarian breakfast',
                'notes' => null,
                'vip' => false,
                'blacklisted' => false,
                'blacklist_reason' => null,
            ],
            [
                'first_name' => 'Ivan',
                'last_name' => 'Petrov',
                'email' => 'ivan.petrov@example.com',
                'phone' => '+491705678901',
                'phone_secondary' => null,
                'document_type' => DocumentType::DriversLicense->value,
                'document_number' => 'ID55667788',
                'date_of_birth' => '1988-03-30',
                'gender' => 'male',
                'nationality' => 'Ukraine',
                'address' => 'Bahnhofstrasse 20',
                'city' => 'Cologne',
                'country' => 'Germany',
                'postal_code' => '50667',
                'preferences' => null,
                'notes' => 'Late payments once',
                'vip' => false,
                'blacklisted' => true,
                'blacklist_reason' => 'Property damage',
            ],
        ];

        foreach ($guests as $guest) {
            Guest::create($guest);
        }
    }
}
