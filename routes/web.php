<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::resource('/advertisement', "App\Http\Controllers\AdvertisementController");
Route::get('/appeal/{id}', "App\Http\Controllers\AdvertisementController@appeal");
Route::get('/basvurular', "App\Http\Controllers\AdvertisementController@basvurular");

//Route::get('/appeal/{id}', [App\Http\Controllers\AdvertisementControlle::class, 'appeal'])->name('appeal');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


