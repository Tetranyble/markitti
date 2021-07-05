<?php

namespace App\Http\Middleware;

use App\Services\IdentificationMiddleware;
use Closure;
use Illuminate\Container\Container;
use Illuminate\Http\Request;

class InitializeStoreByRequestData extends IdentificationMiddleware
{
    /** @var string|null */
    public static $header = 'X-Store';

    /** @var string|null */
    public static $queryParameter = 'store';

    /** @var callable|null */
    public static $onFail;

    /** @var Store */
    protected $store;

    /** @var Container */
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
    public function handle($request, Closure $next)
    {
        if ($request->method() !== 'OPTIONS') {
            return $this->initializeStore($request, $next, $this->getPayload($request));
        }

        return $next($request);
    }

    protected function getPayload(Request $request): ?string
    {
        $store = null;
        if (static::$header && $request->hasHeader(static::$header)) {
            $store = $request->header(static::$header);
        } elseif (static::$queryParameter && $request->has(static::$queryParameter)) {
            $store = $request->get(static::$queryParameter);
        }

        return $store;
    }
}
