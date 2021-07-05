<?php

/**
 * Store tenant routes
 */

use App\Http\Middleware\InitializeStoreByDomainOrSubdomain;
use App\Http\Middleware\PreventAccessFromStoreDomain;
use App\Services\Stores;

Route::middleware([
    'web',
    PreventAccessFromStoreDomain::class,
    InitializeStoreByDomainOrSubdomain::class,

])->group(function () {
    Route::get('/', function (Stores $stores) {
        dd($stores);
        return 'This is your multi-tenant application. The id of the current tenant is ';
    });
});
