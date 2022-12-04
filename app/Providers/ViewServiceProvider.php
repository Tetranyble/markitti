<?php

namespace App\Providers;

use App\Services\Stores;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if (! app()->runningInConsole()) {
            View::composer('*', function ($view) {
                $view->with(['store' => Stores::stores()]);
            });
        }
    }
}
