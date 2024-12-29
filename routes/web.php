<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\CommentController;
use Filament\Pages\Dashboard;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home.index');

// Route::get('/dashboard', [PostController::class, 'index'])->name('dashboard.index');
Route::get('/dashboard/create', [PostController::class, 'create'])->name('dashboard.create');
Route::post('/dashboard/create', [PostController::class, 'store'])->name('dashboard.store');

Route::get('/search', [SearchController::class, 'search'])->name('search');
Route::get('/search/{id}', [SearchController::class, 'show'])->name('search.show');

Route::post('/posts/{post}/like', [PostController::class, 'like'])->name('posts.like');
Route::post('/posts/{post}/unlike', [PostController::class, 'unlike'])->name('posts.unlike');

Route::post('/posts/{id}/like', [PostController::class, 'like'])->name('posts.like');
Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');

Route::get('/dashboard', [DashboardController::class, 'dashboard'])->middleware('auth')->name('dashboard');

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });
