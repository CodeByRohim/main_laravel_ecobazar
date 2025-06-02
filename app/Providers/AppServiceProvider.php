<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Brand;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;
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
     Paginator::useBootstrapFive();
    View::composer('layouts.FrontendLayout', function ($view) {
        $view->with('categories', Category::where('status', true)->latest()->get());
        $view->with('brands', Brand::where('status', true)->latest()->get());
       
    });
}
}