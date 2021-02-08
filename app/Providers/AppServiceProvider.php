<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Http\Controllers\CategoriesController as Categories;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        $categories = new Categories;

        //Popula a view template app-shop, com as categorias
        view()->composer('layouts.app-shop', function($view) use ($categories){
            $view->with('categories', $categories->list());
        });
    }
}
