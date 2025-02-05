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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description')->nullable();
            $table->boolean('is_completed')->default(false);
            $table->enum('priority', ['low', 'medium', 'high'])->default('medium');
            $table->timestamps();

            // Tambahkan foreign key ke tabel task_lists
            $table->foreignId('list_id')->constrained('task_lists', 'id')->onDelete('cascade');
        });
    }

    /**
     * Menghapus tabel tasks.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};

