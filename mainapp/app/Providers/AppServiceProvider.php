<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
// use Illuminate\Support\Facades\View;
// use View;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        Paginator::useBootstrap();
        
        //$categories = Category::all();
        //View::share('categories', $categories);
        /* View::composer('*', function ($view) {
        $categories = Category::all(); // Dohvatite sve kategorije iz baze podataka
        $view->with('categories', $categories); 
    }); */ 
    }
}
