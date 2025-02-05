<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Model untuk tabel task_lists
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Database\Eloquent\Collection|Task[] $tasks
 * @property int|null $tasks_count
 */
class TaskList extends Model
{
    protected $fillable = ['name'];
    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];

    /**
     * Relasi dengan model Task
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tasks()
    {
        return $this->hasMany(Task::class, 'list_id');
    }
}

