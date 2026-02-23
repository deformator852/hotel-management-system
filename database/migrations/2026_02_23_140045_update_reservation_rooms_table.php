<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('reservation_rooms', static function (Blueprint $table): void {
            $table->dropColumn(['price_per_night', 'number_of_nights', 'subtotal']);
        });
    }

    public function down(): void
    {
        Schema::table('reservation_rooms', static function (Blueprint $table): void {
            $table->decimal('price_per_night', 10, 2);
            $table->integer('number_of_nights');
            $table->integer('subtotal');
        });
    }
};
