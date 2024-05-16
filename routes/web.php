<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

Route::get('/', HomeController::class)->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->middleware(['auth', 'verified'])->name('products.create');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
Route::get('/products/edit/{product}', [ProductController::class, 'edit'])->middleware(['auth', 'verified'])->name('products.edit');

Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/create', [CategoryController::class, 'create'])->middleware(['auth', 'verified'])->name('categories.create');
Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
Route::get('/categories/edit/{category}', [CategoryController::class, 'edit'])->middleware(['auth', 'verified'])->name('categories.edit');

Route::get('/tags', [TagsController::class, 'index'])->name('tags.index');
Route::get('/tags/create', [TagsController::class, 'create'])->middleware(['auth', 'verified'])->name('tags.create');
Route::get('/tags/{tag}', [TagsController::class, 'show'])->name('tags.show');
Route::get('/tags/edit/{tag}', [TagsController::class, 'edit'])->middleware(['auth', 'verified'])->name('tags.edit');

require __DIR__.'/auth.php';
