<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;

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
    return (new App\Actions\CreateServerBlock)->execute();
});
