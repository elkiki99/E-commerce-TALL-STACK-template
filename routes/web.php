<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;    

Route::get('/', HomeController::class)->name('home');
Route::view('dashboard', 'dashboard')->middleware('auth', 'verified')->name('dashboard');
Route::view('profile', 'profile')->middleware('auth', 'verified')->name('profile');

Route::get('/cart', [CartController::class, 'show'])->name('cart.show');
Route::get('/likes', [LikeController::class, 'index'])->name('likes.index');

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
Route::get('/products/edit/{product}', [ProductController::class, 'edit'])->name('products.edit');

Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
Route::get('/categories/edit/{category}', [CategoryController::class, 'edit'])->name('categories.edit');

Route::get('/tags', [TagsController::class, 'index'])->name('tags.index');
Route::get('/tags/create', [TagsController::class, 'create'])->name('tags.create');
Route::get('/tags/{tag}', [TagsController::class, 'show'])->name('tags.show');
Route::get('/tags/edit/{tag}', [TagsController::class, 'edit'])->name('tags.edit');

Route::get('/checkout', [StripeController::class, 'show'])->middleware('auth', 'verified')->name('payment.show');
Route::get('/success', [StripeController::class, 'success'])->middleware('auth', 'verified')->name('payment.success');
Route::post('/webhook', [StripeController::class, 'webhook'])->name('payment.webhook');

Route::get('/orders', [OrderController::class, 'index'])->middleware('auth', 'verified')->name('orders.index');
Route::get('/order/{payment:payment_id}', [OrderController::class, 'show'])->middleware('auth', 'verified')->name('orders.show');

require __DIR__.'/auth.php';
