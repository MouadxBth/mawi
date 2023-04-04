<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\Task;
use App\Models\TaskList;
use Illuminate\Http\RedirectResponse;

class TaskController extends Controller
{
    public function store() : RedirectResponse
    {
        error_log("CALLED!");
        request()->validate([
            'name'=> ['required'],
            'description' => ['required'],
            'task_list' => ['required', 'exists:task_lists,id']
        ]);

        Task::factory()->create([
            'name' => request('name'),
            'task_list_id' => request('task_list'),
            'description' => request('description'),
            'completed' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect()->back();
    }

    public function update(Task $task): RedirectResponse
    {
        request()->validate([
            'name' => ['required'],
            'description' => [],
        ]);

        $task->update(['name' => request('name'),
            'description' => request('description'),
            'updated_at' => now()]);

        return redirect()->back();
    }
}
