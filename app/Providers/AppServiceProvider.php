<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        view()->composer('layouts.nav', function ($view){
            $folders = auth()->user()->tags;
            $view->with(compact('folders'));
        });
        view()->composer('layouts.add-card', function ($view){
            $folders = auth()->user()->tags;
            $view->with(compact('folders'));
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
