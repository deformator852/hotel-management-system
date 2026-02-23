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
            $table->dropColumn('number_of_nights');
            $table->dropColumn('total_amount');
        });
    }

    public function down(): void
    {
        Schema::table('reservations', static function (Blueprint $table): void {
            $table->unsignedInteger('number_of_nights')->after('check_out_date');
            $table->unsignedInteger('total_amount')->after('check_out_date');
        });
    }
};
