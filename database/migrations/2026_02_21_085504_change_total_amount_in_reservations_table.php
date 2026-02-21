<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('reservations', static function (Blueprint $table): void {
            $table->decimal('total_amount', 10, 2)->default(0)->change();
        });
    }

    public function down(): void
    {
        Schema::table('reservations', static function (Blueprint $table): void {
            $table->decimal('total_amount', 10, 2)->change();
        });
    }
};
