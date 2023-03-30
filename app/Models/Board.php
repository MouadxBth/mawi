<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    use HasFactory;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, "owner_id");
    }

    public function members() : BelongsToMany
    {
        return $this->belongsToMany(User::class, "board_user");
    }

    public function task_lists() : HasMany
    {
        return $this->hasMany(TaskList::class, "board_id");
    }
}
