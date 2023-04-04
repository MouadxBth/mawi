<?php

use App\Http\Controllers\BoardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskListController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::group(["/middleware" => ['auth', 'verified']], function () {
    Route::get('/boards/{board}', [BoardController::class, "show"])
        ->name("boards.show");

    Route::put('/boards/{board}', [BoardController::class, 'update'])
        ->name('boards.update');

    Route::post('/boards', [BoardController::class, "store"])
        ->name("boards.store");

    Route::get('/dashboard', [BoardController::class, "index"])
        ->name("dashboard");

    Route::post('/boards/{board}/lists', [TaskListController::class, "store"])
        ->name("list.store");

    Route::delete('/boards/lists/{list}', [TaskListController::class, "delete"])
        ->name("list.delete");

    Route::post('/boards/tasks', [TaskController::class, "store"])
        ->name("tasks.store");

    Route::put('/boards/tasks/{task}', [TaskController::class, 'update'])
        ->name('tasks.update');

    Route::delete('/boards/{board}', [BoardController::class, 'delete'])
        ->name('boards.delete');
});
//
//Route::get('/dashboard', function () {
//    return Inertia::render('Dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
