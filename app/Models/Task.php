<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\TaskList;

/**
 * Model untuk Task
 */
class Task extends Model
{
    // Kolom yang dapat diisi
    protected $fillable = [
        'name',
        'description',
        'is_completed',
        'priority',
        'list_id'
    ];

    // Kolom yang tidak dapat diisi atau diubah
    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];

    // Constanta warna untuk prioritas task
    const PRIORITIES = [
        'low',
        'medium',
        'high'
    ];

    // Fungsi untuk mengambil class warna berdasarkan prioritas task
    public function getPriorityClassAttribute()
    {
        return match ($this->attributes['priority']) {
            'low' => 'success',
            'medium' => 'warning',
            'high' => 'danger',
            default => 'secondary'
        };
    }

    // Fungsi untuk mengambil list task
    public function list()
    {
        // Relasi ke class TaskList untuk mengambil data list berdasarkan list_id dari task
        return $this->belongsTo(TaskList::class, 'list_id');
    }
}
