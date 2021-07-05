<?php

namespace App\Providers;

use App\Http\Middleware\InitializeStoreByDomain;
use App\Http\Middleware\InitializeStoreByDomainOrSubdomain;
use App\Http\Middleware\InitializeStoreByRequestData;
use App\Http\Middleware\InitializeStoreBySubdomain;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class StoreServiceProvider extends ServiceProvider
{
    // By default, no namespace is used to support the callable array syntax.
    public static string $controllerNamespace = '';
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
        $this->mapRoutes();

        $this->makeTenancyMiddlewareHighestPriority();
    }

    protected function mapRoutes()
    {
        if (file_exists(base_path('routes/store.php'))) {
            Route::namespace(static::$controllerNamespace)
                ->group(base_path('routes/store.php'));
        }
    }

    protected function makeTenancyMiddlewareHighestPriority()
    {
        $tenancyMiddleware = [
            // Even higher priority than the initialization middleware
            Middleware\PreventAccessFromCentralDomains::class,
            InitializeStoreByDomain::class,
            InitializeStoreBySubdomain::class,
            InitializeStoreByDomainOrSubdomain::class,
            InitializeStoreByRequestData::class
        ];

        foreach (array_reverse($tenancyMiddleware) as $middleware) {
            $this->app[\Illuminate\Contracts\Http\Kernel::class]->prependToMiddlewarePriority($middleware);
        }
    }
}
