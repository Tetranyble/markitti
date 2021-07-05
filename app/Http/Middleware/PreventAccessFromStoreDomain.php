<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PreventAccessFromStoreDomain
{
    /**
     * Set this property if you want to customize the on-fail behavior.
     *
     * @var callable|null
     */
    public static $abortRequest;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        if (in_array($request->getHost(), config('store.central_domains'))) {
            $abortRequest = static::$abortRequest ?? function () {
                    abort(404);
                };

            return $abortRequest($request, $next);
        }

        return $next($request);
    }
}


