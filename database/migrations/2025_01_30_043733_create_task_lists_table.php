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
        // Membuat tabel task_lists
        Schema::create('task_lists', function (Blueprint $table) {
            $table->id(); // Tambahkan kolom id
            $table->string('name')->unique(); // Tambahkan kolom name
            $table->timestamps(); // Tambahkan kolom created_at dan updated_at
        });
    }

    /**
     * Membatalkan migrasi.
     */
    public function down(): void
    {
        // Menghapus tabel task_lists
        Schema::dropIfExists('task_lists');
    }
};
