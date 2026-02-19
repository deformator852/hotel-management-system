<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\RoomType;
use Illuminate\Database\Seeder;

class RoomTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roomTypes = [
            [
                'name' => 'Single',
                'description' => 'Комната для одного гостя',
                'max_guests' => 1,
            ],
            [
                'name' => 'Double',
                'description' => 'Комната для двух гостей',
                'max_guests' => 2,
            ],
            [
                'name' => 'Suite',
                'description' => 'Люкс-комната с отдельной гостиной',
                'max_guests' => 4,
            ],
        ];

        foreach ($roomTypes as $type) {
            RoomType::create($type);
        }
    }
}
