<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
 use Illuminate\Support\Facades\View;
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
        
        
        View::composer('*', function ($view) {
        $sidebarCategories = Category::with('subcategories')->whereNull('parent_id')->get();
        $view->with('sidebarCategories', $sidebarCategories);  
         }); 
    }
}
