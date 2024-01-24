<?php

namespace App\Providers;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Paginator::useBootstrapFive();
        Blade::if('user', function () {
            return auth()->check() && auth()->user()->type=='user';
        });
        Blade::if('userCompany', function () {
            return auth()->check() && auth()->user()->type=='user';
        });
        Blade::if('vendor', function () {
            return auth()->check() && auth()->user()->type=='vendor';
        });
        Blade::if('vendorCompany', function () {
            return auth()->check() && auth()->user()->type=='vendor';
        });
        Blade::if('judger', function () {
            return auth()->check() && auth()->user()->type=='judger';
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
