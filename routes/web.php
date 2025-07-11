<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use App\Http\Controllers\ListController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\DashboardController;
use Illuminate\Foundation\Application;


Route::get('/', function () {
    return Redirect::route('dashboard');
});


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('lists', ListController::class);
    Route::resource('tasks', TaskController::class);
});


require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
