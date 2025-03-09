<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KeywordController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShoppingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider and all of them will
  | be assigned to the "web" middleware group. Make something great!
  |
 */

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', [HomeController::class,'index'])->name('home');

Route::group(['prefix' => 'profile', 'middleware' => 'auth'], function () {
    Route::get('', [ProfileController::class, 'index'])->name('profile')->middleware('auth');
    Route::post('', [ProfileController::class, 'store'])->name('profile')->middleware('auth');

});

Route::group(['prefix'=> 'shopping'], function () {
    Route::get('', [ShoppingController::class, 'index'])->name('shopping.index');
    Route::get('search', [ShoppingController::class,'search'])->name('shopping.search');
    Route::get('show{id}', [ShoppingController::class, 'show'])->name('shopping.show');
    Route::get('category{id}', [ShoppingController::class, 'category'])->name('shopping.category');
});

Route::group(['middleware'=> ['auth', 'seller'], 'prefix'=> 'dashboard'], function(){
    Route::get('', [DashboardController::class,'index'])->name('dashboard.index');
});

Route::group(['prefix'=> 'product', 'middleware' => ['auth','seller']], function () {
    Route::get('', [ProductController::class,'index'])->name('product.index');
    Route::get('/edit{id}', [ProductController::class,'edit'])->name('product.edit');
    Route::delete('/destroy{id}', [ProductController::class,'destroy'])->name('product.destroy');
    Route::post('/store', [ProductController::class,'store'])->name('product.store');
    Route::get('/create', [ProductController::class,'create'])->name('product.create');
    Route::get('/show{id}', [ProductController::class,'show'])->name('product.show');
    Route::put('/update{id}', [ProductController::class,'update'])->name('product.update');
});

Route::group(['prefix' => 'cart', 'middleware' => 'auth'], function(){
    Route::get('', [CartController::class, 'index'])->name('cart.index');
    Route::post('store', [CartController::class, 'store'])->name('cart.store');
    Route::delete('destroy{id}', [CartController::class, 'destroy'])->name('cart.destroy');
});

Route::group(['prefix' => 'order', 'middleware' => 'auth'], function(){
    Route::get('create', [OrderController::class, 'create'])->name('order.create');
    Route::post('store', [OrderController::class, 'store'])->name('order.store');
});
