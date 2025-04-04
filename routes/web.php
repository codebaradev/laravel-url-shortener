<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UrlController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'home'])->name('home');

Route::get('/app/dashboard', [HomeController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/{short}', [UrlController::class, 'get'])->name('urls.get');

Route::middleware('auth')->group(function () {
    Route::get('/users/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/users/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/users/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post("/app/urls", [UrlController::class, 'create'])->name('urls.create');
    Route::put("/app/urls/{id}", [UrlController::class, 'update'])->where('id', '[0-9]+')->name('urls.update');
    Route::delete("/app/urls/{id}", [UrlController::class, 'delete'])->where('id', '[0-9]+')->name('urls.delete');
});

require __DIR__.'/auth.php';
