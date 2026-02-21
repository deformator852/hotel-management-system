<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Room;
use App\Models\RoomType;
use App\RoomStatus;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    public function run(): void
    {
        $roomTypes = RoomType::pluck('id', 'name');
        $rooms = [
            [
                'number' => '101',
                'floor' => 1,
                'status' => RoomStatus::Available->value,
                'beds' => 1,
                'price' => 50,
                'area' => 18.5,
                'has_balcony' => false,
                'description' => 'Уютная одноместная комната',
                'room_type_id' => $roomTypes['Single'],
            ],
            [
                'number' => '102',
                'floor' => 1,
                'status' => RoomStatus::Available->value,
                'beds' => 2,
                'price' => 40,
                'area' => 25.0,
                'has_balcony' => true,
                'description' => 'Двухместная комната с балконом',
                'room_type_id' => $roomTypes['Double'],
            ],
            [
                'number' => '201',
                'floor' => 2,
                'status' => RoomStatus::Available->value,
                'beds' => 1,
                'price' => 40,
                'area' => 20.0,
                'has_balcony' => false,
                'description' => 'Одноместная комната на втором этаже',
                'room_type_id' => $roomTypes['Single'],
            ],
            [
                'number' => '202',
                'floor' => 2,
                'status' => RoomStatus::Available->value,
                'beds' => 2,
                'price' => 65,
                'area' => 28.0,
                'has_balcony' => true,
                'description' => 'Двухместная комната с балконом',
                'room_type_id' => $roomTypes['Double'],
            ],
            [
                'number' => '301',
                'floor' => 3,
                'status' => RoomStatus::Available->value,
                'beds' => 3,
                'price' => 70,
                'area' => 45.0,
                'has_balcony' => true,
                'description' => 'Люкс-комната для семьи',
                'room_type_id' => $roomTypes['Suite'],
            ],
        ];

        foreach ($rooms as $room) {
            Room::create($room);
        }
    }
}
