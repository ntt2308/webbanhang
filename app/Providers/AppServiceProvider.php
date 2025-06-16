<?php

namespace App\Providers;

use App\Models\Models\Cart;
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
        view()->composer('*', function($view){
            $cart = new Cart();
            $carts = Cart::orderBy('quantity','DESC')->get();
            $view->with(compact('cart','carts'));
        });
    }
}
