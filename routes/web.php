<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('welcome');
})->name('home');

//Pokémon
Route::group(['prefix' => 'pokemon'], function () {
    Route::get('/', [\App\Http\Controllers\PokemonController::class, 'index'])->name('pokemon');
    Route::post('search', [\App\Http\Controllers\PokemonController::class, 'search'])->name('pokesearch');
});


//Ecommerce
Route::group(['prefix' => 'shop'], function () {
    //Client Routes
    Auth::routes();
    Route::get('/', [\App\Http\Controllers\ProductsController::class, 'list'])->name('shop');
    Route::get('cart', [\App\Http\Controllers\CartController::class, 'index'])->name('cart');
    Route::resource('cart_products', \App\Http\Controllers\CartProductsController::class);
    Route::get('products/category/{id}', [\App\Http\Controllers\CategoriesProductsController::class, 'list'])->name('product.category');
    Route::post('search', [\App\Http\Controllers\ProductsController::class, 'search'])->name('product.search');

    //Admin Routes
    Route::group(['prefix' => 'admin'], function () {
        Route::get('/', function(){
            return view('shop.admin.login');
        });

        Route::get('dashboard', function(){
            return view('shop.admin.dashboard');
        })->name('dashboard');

        Route::resource('products', \App\Http\Controllers\ProductsController::class);
        Route::resource('categories', \App\Http\Controllers\CategoriesController::class);
        Route::resource('categories_products', \App\Http\Controllers\CategoriesProductsController::class);
        Route::resource('status', \App\Http\Controllers\StatusController::class);
        Route::resource('orders', \App\Http\Controllers\OrdersController::class);
    });
});




