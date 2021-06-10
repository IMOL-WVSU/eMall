<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AddressOfUserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('home', fn() => redirect(''));
Route::get('', [HomeController::class, 'dashboardData']);

Route::get('product/{id}', [ProductController::class, 'getProduct']);
Route::get('product', fn() => redirect(''));
Route::get('search', [ProductController::class, 'searchProducts']);

Route::middleware(['auth', 'verified'])->group(function() {
    Route::post('cart', [CartController::class, 'addToCart']);
    Route::get('cart', [CartController::class, 'retrieveCart']);

    Route::post('checkout', [OrderController::class, 'placeOrder']);
    Route::post('remcart', [CartController::class, 'removeItem']);
    
    Route::get('profile', [UserController::class, 'getProfile']);
    Route::post('updateProfile', [UserController::class, 'updateProfile']);
    Route::post('updateAddress', [UserController::class, 'updateAddress']);

    Route::get('order', [OrderController::class, 'getOrders']);

    Route::post('addproduct', [ProductController::class, 'addProduct']);
    Route::post('editproduct', [ProductController::class, 'editProduct']);
    Route::post('remproduct', [ProductController::class, 'removeProduct']);

    Route::post('registerSeller', [AdminController::class, 'registerSeller']);
    Route::get('admin', [AdminController::class, 'viewAdmin']);
    Route::get('manageproduct', [AdminController::class, 'manageProduct']);
});