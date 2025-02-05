<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

/**
 * Class DatabaseSeeder
 *
 * Seeder untuk mengisi database dengan data awal
 *
 * @package Database\Seeders
 */
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Jalankan seeder untuk mengisi tabel TaskList
        $this->call(TaskListSeeder::class);

        // Jalankan seeder untuk mengisi tabel Task
        $this->call(TaskSeeder::class);
    }
}