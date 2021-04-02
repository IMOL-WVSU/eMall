<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AddressOfUserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
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
Route::post('cart', [CartController::class, 'addToCart'])->middleware('auth');
Route::get('cart', [CartController::class, 'retrieveCart'])->middleware('auth');
Route::post('checkout', [OrderController::class, 'placeOrder'])->middleware('auth');
Route::post('remcart', [CartController::class, 'removeItem'])->middleware('auth');
Route::get('profile', [UserController::class, 'getProfile'])->middleware('auth');
Route::post('updateProfile', [UserController::class, 'updateProfile'])->middleware('auth');
Route::post('updateAddress', [UserController::class, 'updateAddress'])->middleware('auth');
Route::get('order', [OrderController::class, 'getOrders'])->middleware('auth');
Route::get('search', [ProductController::class, 'searchProducts']);