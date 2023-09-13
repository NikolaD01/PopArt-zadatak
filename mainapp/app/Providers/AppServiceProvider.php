<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
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

         Validator::extend('phone_number', function ($attribute, $value, $parameters, $validator)
        {
            if (substr($value, 0, 1) !== '+')
            {
                return false;
            }

            $phoneNumber = substr($value, 1);
            return preg_match('/^\d{8,12}$/', $phoneNumber) === 1;
        });
         
    }
}
