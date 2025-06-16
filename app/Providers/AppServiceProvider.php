<?php

namespace App\Providers;

use App\Models\Cart;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
    // View::composer('layouts.FrontendLayout', function ($view) {
    //      $user = Auth::guard('customer')->user() ?? Auth::guard('web')->user();
        
    //     $view->with('categories', Category::where('status', true)->latest()->get())
    //         ->with('cartCount', Cart::where(function ($q) use ($user) {
    //          $q->where('ip', request()->ip());
    //             if($user){
    //                $q->where('userable_type', get_class($user))->orWhere('userable_id', auth()?->user()?->id);                
    //             }
    //         })->count())
    //         ->with('brands', Brand::where('status', true)->latest()->get());
                  
    // });



    View::composer('layouts.FrontendLayout', function ($view) {
    $customer = Auth::guard('customer')->user();
    $webUser = Auth::guard('web')->user();
    $user = $customer ?? $webUser;

    $cartCount = Cart::query()
        ->when($user, function ($query) use ($user) {
            $query->where('userable_type', get_class($user))
                  ->where('userable_id', $user->id);
        }, function ($query) {
            $query->where('ip', request()->ip());
        })
        ->count();

    $view->with('categories', Category::where('status', true)->latest()->get())
         ->with('brands', Brand::where('status', true)->latest()->get())
         ->with('cartCount', $cartCount);
});
}
}