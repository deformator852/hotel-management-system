<?php

declare(strict_types=1);

use App\DocumentType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('guests', static function (Blueprint $table): void {
            $table->id();

            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('phone_secondary')->nullable(); // Дополнительный телефон

            // Документы
            $table->enum(
                'document_type',
                array_map(static fn ($case) => $case->value, DocumentType::cases())
            );
            $table->string('document_number')->unique();

            // Личные данные
            $table->date('date_of_birth')->nullable();
            $table->enum('gender', ['male', 'female', 'other'])->nullable();
            $table->string('nationality', 100)->nullable(); // Гражданство

            // Адрес
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('postal_code', 20)->nullable();

            // Предпочтения и заметки
            $table->text('preferences')->nullable(); // Предпочтения гостя
            $table->text('notes')->nullable(); // Внутренние заметки персонала
            $table->boolean('vip')->default(false); // VIP гость
            $table->boolean('blacklisted')->default(false); // Чёрный список
            $table->text('blacklist_reason')->nullable();

            $table->timestamps();
            $table->softDeletes(); // Мягкое удаление

            // Индексы для быстрого поиска
            $table->index('email');
            $table->index('phone');
            $table->index('document_number');
            $table->index(['first_name', 'last_name']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guests');
    }
};
