<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\isAdmin;

use App\Http\Controllers\DownloadController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CategoriesProductsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\PokemonController;
use App\Http\Controllers\CartProductsController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\OrdersController;



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

//Portifólio Página Inicial
Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/contacts', function () {
    return view('contacts');
})->name('contacts');

Route::get('/curriculum', [DownloadController::class, 'download'])->name('curriculum');

//Página Pokémon
Route::group(['prefix' => 'pokemon'], function () {
    Route::get('/', function(){
        return view('layouts.app-pokemon');
    })->name('pokemon');
});


//Ecommerce
Route::group(['prefix' => 'shop'], function () {

    //Client Routes
    Auth::routes();
    Route::get('/', [ProductsController::class, 'list'])->name('shop');
    Route::get('cart', [CartController::class, 'index'])->name('cart');
    Route::resource('cart_products', CartProductsController::class);
    Route::get('products/category/{id}', [CategoriesProductsController::class, 'list'])->name('product.category');
    Route::get('product/detail/{url}', [ProductsController::class, 'productDetail'])->name('product.detail');
    Route::post('search', [ProductsController::class, 'search'])->name('product.search');

    //Client Authenticated
    Route::middleware(['auth'])->group(function () {
        Route::get('client/orders', [OrdersController::class, 'list'])->name('orders.user');
        Route::post('order', [OrdersController::class, 'store'])->name('orders.store');
    });

    //Admin Routes
    Route::prefix('admin')->middleware(isAdmin::class)->group(function(){

        //página inicial admin
        Route::get('/', function(){
            return view('shop.admin.dashboard');
        })->name('dashboard');

        //Rotas resource para crud
        Route::resource('products', ProductsController::class);
        Route::resource('categories', CategoriesController::class);
        Route::resource('categories_products', CategoriesProductsController::class);
        Route::resource('status', StatusController::class);
        Route::get('orders/index', [OrdersController::class, 'index'])->name('orders.index');
        Route::get('orders/edit/{id}', [OrdersController::class, 'edit'])->name('orders.edit');
    });

    //Pagina não encontrada!
    Route::fallback(function () {
        return view('shop.fallback');
    })->name('fallback');
});
