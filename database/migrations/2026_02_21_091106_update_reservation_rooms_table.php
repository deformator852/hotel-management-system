<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('reservation_rooms', function (Blueprint $table) {
            $table->dropForeign(['room_type_id']); // удаляем внешнее ограничение
            $table->dropColumn('room_type_id');    // удаляем колонку
        });
    }

    public function down(): void
    {
        Schema::table('reservation_rooms', function (Blueprint $table) {
            $table->foreignId('room_type_id')->constrained()->after('room_id');
        });
    }
};
