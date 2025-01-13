<?php

use App\Livewire\ShowPost;
use Filament\Pages\Dashboard;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\GoogleController;

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/posts/{post:slug}', [HomeController::class, 'show'])->name('posts.show');


// Route::get('/dashboard', [PostController::class, 'index'])->name('dashboard.index');
Route::get('/dashboard/create', [PostController::class, 'create'])->name('dashboard.create');
Route::post('/dashboard/create', [PostController::class, 'store'])->name('dashboard.store');
Route::get('/show{id}', [PostController::class, 'show'])->name('show');


Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');


Route::get('/search', [SearchController::class, 'search'])->name('search');
Route::get('/search/{id}', [SearchController::class, 'show'])->name('search.show');


Route::post('/posts/{post}/like', [PostController::class, 'like'])->name('posts.like');
Route::post('/posts/{post}/unlike', [PostController::class, 'unlike'])->name('posts.unlike');


Route::post('/posts/{id}/like', [PostController::class, 'like'])->name('posts.like');
Route::get('/posts/{postId}', ShowPost::class)->name('posts.show');


Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');



// Ensure the user is authenticated to access the profile page
Route::middleware(['auth:sanctum', 'verified'])->get('/profile', [ProfileController::class, 'show'])->name('dashboard.profile');
Route::middleware(['auth:sanctum', 'verified'])->put('/profile', [ProfileController::class, 'update'])->name('profile.update');


Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });
