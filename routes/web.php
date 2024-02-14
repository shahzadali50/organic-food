<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/', [ProductController::class, 'index'])->name('home');
Route::get('/about-us', [MainController::class, 'about_us'])->name('about.us');
Route::get('/products', [MainController::class, 'products'])->name('products');
Route::get('/404', [MainController::class, 'not_show'])->name('404');
Route::get('/contact-us', [MainController::class, 'contact_us'])->name('contact.us');
Route::get('/testimonial', [MainController::class, 'testimonial'])->name('testimonial');
Route::get('/features', [MainController::class, 'features'])->name('features');
// Add to cart Route
Route::get('/cart', [CartController::class, 'cart'])->name('cart');
Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('front.addToCart');
Route::post('/update-cart', [CartController::class, 'updateCart'])->name('front.updateCart');
Route::post('/delete-item', [CartController::class, 'deleteItem'])->name('front.deleteItem.cart');
// checkout
Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');
// OrderGenerate
Route::post('/OrderGenerate', [OrderController::class, 'oderGenerate'])->name('order.generate');
