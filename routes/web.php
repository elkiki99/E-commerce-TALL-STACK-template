<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;

Route::get('/', HomeController::class)->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

// Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products/create', [ProductController::class, 'store'])->name('products.store');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
Route::get('/products/edit/{id}', [ProductController::class, 'edit'])->name('products.edit');
Route::post('/products/edit/{id}', [ProductController::class, 'update'])->name('products.update');

require __DIR__.'/auth.php';
