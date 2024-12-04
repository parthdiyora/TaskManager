<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Manager Routes
Route::prefix('manager')->name('manager.')->namespace('Manager')->group(function () {
    Route::get('login', [ManagerController::class, 'index'])->name('login');
    Route::post('login', [ManagerController::class, 'store'])->name('login.store');
    Route::post('logout', [ManagerController::class, 'logout'])->name('logout');
    Route::get('dashboard', [ManagerController::class, 'dashboard'])->name('dashboard')->middleware(['auth', 'role:manager']);
});

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AdminController::class, 'index'])->name('login');
    Route::post('/login', [AdminController::class, 'store'])->name('login.store');
    Route::middleware(['auth','role:admin'])->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::get('/users', [AdminController::class, 'users'])->name('users');
        Route::patch('/users/{user}/role', [AdminController::class, 'updateRole'])->name('update.role');

        // Task routes
        Route::get('/tasks', [TaskController::class, 'index'])->name('tasks');
        Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
        Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
    });
});

require __DIR__.'/auth.php';
