<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('{any}', function () {
    return view('swapi.index');
})->where('any', '.*');
// Marketing site routes
//Route::domain(env('APP_URL'))->group( function () {
//    // Marketing home page
//    Route::get('/', function (){
//        return 'main site loaded';
//    });
//});

// Customer routes
//Route::domain('{account}.'.env('APP_URL'))->namespace('Store')->group(function () {
//    // Customer home page route
//    // All routes in this group will receive $account as first parameter
//    // Use route–model binding to have $account be an Account instance
//    Route::get('/', function (){
//        return 'tenant sites loaded';
//    });
//});


