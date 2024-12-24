<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Filament\Pages\Dashboard;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::get('/dashboard', [PostController::class, 'index'])->name('dashboard.index');
Route::get('/dashboard/create', [PostController::class, 'create'])->name('dashboard.create');
Route::post('/dashboard/create', [PostController::class, 'store'])->name('dashboard.store');


Route::get('/dashboard', [DashboardController::class, 'dashboard'])->middleware();

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
