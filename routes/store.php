<?php

/**
 * Store tenant routes
 */

use App\Http\Controllers\ProductController;
use App\Http\Controllers\StoreFrontEntryController;
use App\Http\Middleware\InitializeStoreByDomainOrSubdomain;
use App\Http\Middleware\PreventAccessFromStoreDomain;
use App\Models\Store;
use App\Services\Stores;
use Illuminate\Support\Facades\Route;

Route::middleware([
    'web',
    PreventAccessFromStoreDomain::class,
    InitializeStoreByDomainOrSubdomain::class,

])->group(function () {
    //Route::impersonate();
    Auth::routes(['verify' => true]);
    Route::get('/', \App\Http\Controllers\StoreIndexController::class)->name('store.index');

    Route::get('products', [ProductController::class, 'index'])->name('products.index');
    Route::get('products/product:slug', [ProductController::class, 'show'])->name('products.show');





    Route::prefix('administration')->middleware(['auth'])->group(function (){
        Route::get('/', \App\Http\Controllers\Administration\AdministrationController::class)
            ->name('administration');
        Route::resource('/accounts', \App\Http\Controllers\Administration\AccountController::class)
            ->except(['index']);
        Route::get('store/create', [\App\Http\Controllers\Administration\StoreController::class, 'create'])
            ->name('administration.store.create');
        Route::get('store/{store:id}/edit', [\App\Http\Controllers\Administration\StoreController::class, 'edit'])
            ->name('administration.store.edit');
        Route::get('store/{store:id}', [\App\Http\Controllers\Administration\StoreController::class, 'show'])
            ->name('administration.store.show');

        Route::get('products', [\App\Http\Controllers\Administration\ProductController::class, 'index'])
            ->name('administration.products.index');

        //Users
        Route::get('users', [\App\Http\Controllers\Administration\UserController::class, 'index'])
            ->name('administration.users.index');
    });

});
