<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UrlController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'home'])->name('home');

Route::get('/app/dashboard', [HomeController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/users/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/users/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/users/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post("/app/urls", [UrlController::class, 'create'])->name('urls.create');
});

require __DIR__.'/auth.php';
