<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProductController::class, 'index'])->name('products.index');
Route::get('cart', [CartController::class, 'viewCart'])->name('cart.index');
Route::get('add-to-cart/{id}', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('remove-from-cart/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');
Route::get('checkout', [OrderController::class, 'checkout'])->name('checkout.index');
Route::post('place-order', [OrderController::class, 'Order'])->name('order.place');
Route::post('/cart/update/{id}', [CartController::class, 'updateQuantity'])->name('cart.update');
Route::get('/cart/check/{id}', [CartController::class, 'check'])->name('cart.check');
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');

Route::get('/order/{id}/invoice', [OrderController::class, 'generateInvoice'])->name('order.invoice');
