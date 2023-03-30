<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TaskList extends Model
{
    use HasFactory;

    public function tasks() : HasMany
    {
        return $this->hasMany(Task::class, "task_id_list");
    }

    public function board() : BelongsTo
    {
        return $this->belongsTo(Board::class, "board_id");
    }
}
