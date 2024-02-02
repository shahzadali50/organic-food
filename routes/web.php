<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProductController;

// Route::get('/', function () {
//     return view('home');
// });

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
