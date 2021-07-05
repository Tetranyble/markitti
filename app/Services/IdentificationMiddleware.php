<?php

namespace App\Services;

use App\Models\Store;
use Closure;
use Illuminate\Http\Request;

abstract class IdentificationMiddleware
{


    /** @var Container */
    protected $container;

    protected $store;

    public function initializeStore( Request $request, Closure $next, $domain)
    {
        $this->store = Store::whereHas('domains', function ($q) use ($domain) {
            $q->where('domain', $domain);})->with('domains')->firstOrFail();
        if ($this->store){
             $this->container->singleton(Stores::class, function ($app){
                return new Stores($this->store);
             });
         }

        return $next($request);
    }
}
