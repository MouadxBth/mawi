<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response;

class BoardController extends Controller
{
    public function show() : Response
    {
        return Inertia::render("Board");
    }

    public function index() : Response
    {
        return Inertia::render('Boards', [
            "boards" => auth()->user()->boards
        ]);
    }
}
