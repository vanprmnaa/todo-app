<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Menjalankan migrasi.
     */
    public function up(): void
    {
        Schema::create('task_lists', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->timestamps();
        });
    }

    /**
     * Membatalkan migrasi.
     */
    public function down(): void
    {
        Schema::dropIfExists('task_lists');
    }
};

