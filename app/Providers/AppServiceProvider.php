<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;


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
           //   //defaultStringLength changed to 191 to support mysql below 5.7
           Schema::defaultStringLength(191);

           Paginator::defaultView('vendor.custom-pagination');
   
           Paginator::defaultSimpleView('simple-pagination');
    }
}
