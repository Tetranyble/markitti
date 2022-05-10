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
Route::resource('/product', ProductController::class);
Route::get('/', function () {
    return view('components.home');
});
Route::get('/block', function (Request $request){
    $configurations = \App\Models\ServerBlock::whereStatus(true)->first();
    dd($configurations);
    $configuration = \Nginx\Conf::CreateFromString($configurations->block)->GetAsString();
    dd($configuration);
    return (new pp\Actions\CreateServerBlock)->execute();
});

Route::resource('server', StoreController::class);
Route::get('test/sudo', function(){
//    return (memory_get_usage(true) / 1024 / 1024);

    $command = "bash -c php artisan make:job Imperial";
    \Symfony\Component\Process\Process::fromShellCommandline($command)->run(function ($type, $data){
        \Illuminate\Support\Facades\Log::error($data);
    });

});
