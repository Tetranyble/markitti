<?php

namespace App\Http\Middleware;

use App\Services\Stores;
use Closure;
use Illuminate\Http\Request;

class TenantSessions
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (! $request->session()->has('store_id')){
            $request->session()->put('store_id', app(Stores::class)->id);
            return $next($request);
        }
        if ($request->session()->get('store_id') !== app(Stores::class)->id){
            abort(401);
        }
        return $next($request);
    }
}
