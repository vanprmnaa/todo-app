<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaskList extends Model
{
    // Kolom yang dapat diisi
    protected $fillable = ['name'];

    // Kolom yang tidak dapat diisi
    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];

    // Fungsi untuk mengambil task
    public function tasks()
    {
        // Relasi ke class Task untuk mendapatkan data tasks yang list_id nya sesuai dengan id dari list
        return $this->hasMany(Task::class, 'list_id');
    }
}
