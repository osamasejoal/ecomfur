<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/dashboard', function () {
    return view('admin');
})->middleware(['auth', 'verified', 'role:admin'])->name('admin');

Route::get('/moderator/dashboard', function () {
    return view('moderator');
})->middleware(['auth', 'verified', 'role:moderator'])->name('moderator');

Route::get('/user/dashboard', function () {
    return view('user');
})->middleware(['auth', 'verified', 'role:user'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
