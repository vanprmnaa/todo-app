<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\TaskList;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

/**
 * Class TaskSeeder
 * 
 * Seeder untuk tabel Task
 * 
 * @package Database\Seeders
 */
class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /**
         * Data awal task yang akan diinput ke dalam tabel Task
         * 
         * @var array $tasks
         */
        $tasks = [
            [
                'name' => 'Belajar Laravel',
                'description' => 'Belajar Laravel di santri koding',
                'is_completed' => false,
                'priority' => 'medium',
                'list_id' => TaskList::where('name', 'Belajar')->first()->id,
            ],
            [
                'name' => 'Belajar React',
                'description' => 'Belajar React di WPU',
                'is_completed' => false,
                'priority' => 'high',
                'list_id' => TaskList::where('name', 'Belajar')->first()->id,
            ],
            [
                'name' => 'Pantai',
                'description' => 'Liburan ke Pantai bersama keluarga',
                'is_completed' => false,
                'priority' => 'low',
                'list_id' => TaskList::where('name', 'Liburan')->first()->id,
            ],
            [
                'name' => 'Villa',
                'description' => 'Liburan ke Villa bersama teman sekolah',
                'is_completed' => false,
                'priority' => 'medium',
                'list_id' => TaskList::where('name', 'Liburan')->first()->id,
            ],
            [
                'name' => 'Matematika',
                'description' => 'Tugas Matematika bu Nina',
                'is_completed' => false,
                'priority' => 'medium',
                'list_id' => TaskList::where('name', 'Tugas')->first()->id,
            ],
            [
                'name' => 'PAIBP',
                'description' => 'Tugas presentasi pa budi',
                'is_completed' => false,
                'priority' => 'high',
                'list_id' => TaskList::where('name', 'Tugas')->first()->id,
            ],
            [
                'name' => 'Project Ujikom',
                'description' => 'Membuat project Todo App untuk ujikom',
                'is_completed' => false,
                'priority' => 'high',
                'list_id' => TaskList::where('name', 'Tugas')->first()->id,
            ],
            [
                'name' => 'maling mbee',
                'description' => 'maling mbee di rumah pak rt',
                'is_completed' => false,
                'priority' => 'low',
                'list_id' => TaskList::where('name', 'Maling')->first()->id,
            ],
            [
                'name' => 'maling sapi',
                'description' => 'maling sapi di rumah pa kades',
                'is_completed' => false,
                'priority' => 'high',
                'list_id' => TaskList::where('name', 'Maling')->first()->id,
            ],
            [
                'name' => 'todo list',
                'description' => 'menyelesaikan aplikasi minggu ini',
                'is_completed' => false,
                'priority' => 'high',
                'list_id' => TaskList::where('name', 'Ujikom')->first()->id,
            ]
        ];

        /**
         * Insert data awal task ke dalam tabel Task
         */
        Task::insert($tasks);
    }
}

