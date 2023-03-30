<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    public function task_list() : BelongsTo
    {
        return $this->belongsTo(TaskList::class, "task_list_id");
    }

}
