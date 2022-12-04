<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StoreController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Nfigurator\Directive;
use Nfigurator\Scope;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
//
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', function (){
    return 'this environment';
});

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
    Route::get('stores', [\App\Http\Controllers\Administration\StoreController::class, 'index'])
        ->name('administration.stores.index');
    //Users
    Route::get('users', [\App\Http\Controllers\Administration\UserController::class, 'index'])
        ->name('administration.users.index');
});

//Route::get('/block', function (Request $request){
//    $configurations = \App\Models\ServerBlock::whereStatus(true)->first();
//
//    $configuration = \Nginx\Conf::CreateFromString($configurations->block)->GetAsString();
//
//    return (new App\Actions\CreateServerBlock)->execute();
//});
//Route::get('server/test', [StoreController::class, 'store']);
//Route::resource('server', StoreController::class);
//Route::get('test/sudo', function(){
////    return (memory_get_usage(true) / 1024 / 1024);
//
//    $command = "bash -c php artisan make:job Imperial";
//    \Symfony\Component\Process\Process::fromShellCommandline($command)->run(function ($type, $data){
//        \Illuminate\Support\Facades\Log::error($data);
//    });
//
//});




