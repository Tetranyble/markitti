<?php

namespace App\Http\Middleware;

use App\Services\IdentificationMiddleware;
use Closure;
use Illuminate\Container\Container;
use Illuminate\Http\Request;

class InitializeStoreByDomain extends IdentificationMiddleware
{
    protected $store;
    protected $container;
    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        return $this->initializeStore(
            $request, $next, $request->getHost()
        );

    }
}
