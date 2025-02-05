<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\TaskList;

/**
 * Model untuk Task
 */
class Task extends Model
{
    /**
     * Kolom yang dapat diisi
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'is_completed',
        'priority',
        'list_id'
    ];

    /**
     * Kolom yang tidak dapat diubah
     *
     * @var array
     */
    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];

    /**
     * List of priorities
     *
     * @var array
     */
    const PRIORITIES = [
        'low',
        'medium',
        'high'
    ];

    /**
     * Mengembalikan class berdasarkan prioritas
     *
     * @return string
     */
    public function getPriorityClassAttribute() {
        return match($this->attributes['priority']) {
            'low' => 'success',
            'medium' => 'warning',
            'high' => 'danger',
            default => 'secondary'
        };
    }

    /**
     * Relasi dengan TaskList
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function list() {
        return $this->belongsTo(TaskList::class, 'list_id');
    }
}

