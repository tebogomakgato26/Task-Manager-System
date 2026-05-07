<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;




Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    $totalTasks = \App\Models\Task::count();
    $pendingTasks = \App\Models\Task::where('status', 'pending')->count();
    $inProgressTasks = \App\Models\Task::where('status', 'in_progress')->count();
    $completedTasks = \App\Models\Task::where('status', 'completed')->count();
    $recentTasks = \App\Models\Task::with(['category'])->latest()->take(5)->get();
    return view('dashboard', compact('totalTasks', 'pendingTasks', 'inProgressTasks', 'completedTasks', 'recentTasks'));
})->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware('auth')->group(function () {
   
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
    Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
    Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
    Route::get('/tasks/{id}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
    Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
    Route::put('/tasks/{id}', [TaskController::class, 'update'])->name('tasks.update');
    Route::delete('/tasks/{id}', [TaskController::class, 'destroy'])->name('tasks.destroy');
});


require __DIR__ . '/auth.php';