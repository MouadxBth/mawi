<?php

namespace App\Http\Controllers;

use App\Models\Board;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class BoardController extends Controller
{
    public function show(Board $board) : Response
    {
        $board->load('task_lists');
        $board->load('task_lists.tasks');

        return Inertia::render("Boards/Show", [
            'board' => $board
        ]);
    }

    public function index() : Response
    {
        return Inertia::render('Boards/Index', [
            "boards" => auth()->user()->boards
        ]);
    }

    public function update(Board $board): RedirectResponse
    {
        request()->validate([
            'name' => ['required', 'max:255']
        ]);

        $board->update(['name' => request('name')]);

        return redirect()->back();
    }

    public function store(): RedirectResponse
    {
        request()->validate([
            'name' => ['required'],
            'description' => ['required'],
        ]);

        Board::factory()->create([
            'name' => request('name'),
            'owner_id' => auth()->id(),
            'description' => request('description'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect()->back();
    }

    public function delete(Board $board)
    {
        $board->delete();
    }
}
