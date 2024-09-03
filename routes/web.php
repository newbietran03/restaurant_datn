<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
// backend 
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\CategoriesController;
use App\Http\Controllers\Backend\NewsController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\CommentController;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// Route cho admin layout
Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('admin/categories', CategoriesController::class);
    Route::resource('admin/news', NewsController::class);
    Route::resource('admin/users', UserController::class);
    Route::resource('admin/comments', CommentController::class);
});
Route::get('admin', [AdminController::class, 'index'])->name('admin');

require __DIR__.'/auth.php';
