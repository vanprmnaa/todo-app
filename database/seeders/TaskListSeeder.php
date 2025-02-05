<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TaskList;

/**
 * Seeder untuk tabel TaskList.
 */
class TaskListSeeder extends Seeder
{
    /**
     * Menjalankan seeder untuk tabel TaskList.
     */
    public function run(): void
    {
        $lists = [
            [
                'name' => 'Liburan',
            ],
            [
                'name' => 'Belajar',
            ],
            [
                'name' => 'Tugas',
            ],
            [
                'name' => 'Maling',
            ],
            [
                'name' => 'Ujikom',
            ]
        ];

        // Menyimpan data ke dalam tabel TaskList
        TaskList::insert($lists);
    }
}