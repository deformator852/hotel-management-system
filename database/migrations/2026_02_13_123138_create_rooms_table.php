<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string("number", 15)->unique();
            $table->unsignedInteger("floor");
            $table->string("status");
            $table->unsignedInteger("beds");
            $table->decimal("area");
            $table->boolean("has_balcony");
            $table->text("description")->nullable();
            $table->foreignId("room_type_id")->constrained()->restrictOnDelete();
            $table->timestamps();
        });
        DB::statement('ALTER TABLE rooms ADD CONSTRAINT check_floor_positive CHECK (floor <= 2000)');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
