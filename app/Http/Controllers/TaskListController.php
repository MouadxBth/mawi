<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\TaskList;
use Illuminate\Http\RedirectResponse;

class TaskListController extends Controller
{
    public function store(Board $board) : RedirectResponse
    {
        error_log("CALLED!");
        request()->validate([
            'name'=> ['required'],
            'description' => ['required'],
        ]);

        TaskList::factory()->create([
            'name' => request('name'),
            'board_id' => $board->id,
            'description' => request('description'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect()->back();
    }

    public function delete(TaskList $list)
    {
        $list->delete();
    }
}
