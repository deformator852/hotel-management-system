<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('rooms', static function (Blueprint $table): void {
            $table->decimal('price', 8, 2)->after('number');
        });
    }

    public function down(): void
    {
        Schema::table('rooms', static function (Blueprint $table): void {
            $table->dropColumn('price');
        });
    }
};
