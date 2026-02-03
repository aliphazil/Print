<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/teacher-area', function () {
    return 'Teacher Area';
})->middleware(['auth', 'role:teacher']);

Route::get('/printer-area', function () {
    return 'Printer Area';
})->middleware(['auth', 'role:printer']);

Route::get('/leader-area', function () {
    return 'Leader Area';
})->middleware(['auth', 'role:leader']);
git status

require __DIR__.'/auth.php';
