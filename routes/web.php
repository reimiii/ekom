<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', \App\Http\Controllers\HomeController::class)->name('home');
Route::post('cart/{product:slug}', [\App\Http\Controllers\CartsController::class, 'store'])->name('cart.store');
Route::resource('products', \App\Http\Controllers\ProductsController::class);

Route::middleware('auth')->group(function () {
    Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('dashboard', \App\Http\Controllers\DashboardController::class)->name('dashboard');
});

require __DIR__ . '/auth.php';
