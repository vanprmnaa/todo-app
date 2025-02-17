<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Membuat tabel tasks.
     */
    public function up(): void
    {
        // Membuat tabel tasks
        Schema::create('tasks', function (Blueprint $table) {
            $table->id(); // Tambahkan kolom id
            $table->string('name'); // Tambahkan kolom name
            $table->string('description')->nullable(); // Tambahkan kolom description yang boleh kosong
            $table->boolean('is_completed')->default(false); // Tambahkan kolom is_completed dengan nilai default false
            $table->enum('priority', ['low', 'medium', 'high'])->default('medium'); // Tambahkan kolom priority dengan nilai default medium
            $table->timestamps(); // Tambahkan kolom created_at dan updated_at

            // Tambahkan foreign key ke tabel task_lists untuk menghubungkan task dengan list
            $table->foreignId('list_id')->constrained('task_lists', 'id')->onDelete('cascade');
        });
    }

    /**
     * Menghapus tabel tasks.
     */
    public function down(): void
    {
        // Hapus tabel tasks
        Schema::dropIfExists('tasks');
    }
};
