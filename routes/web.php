<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BunbouguController;
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

Route::get('/bunbougus', 'App\Http\Controllers\BunbouguController@index')
    ->name('bunbougus.index');

Route::get("/bunbougus/create", "App\Http\Controllers\BunbouguController@create")
    ->name("bunbougu.create");

Route::post("/bunbougus/store/", "App\Http\Controllers\BunbouguController@store")
    ->name("bunbougu.store");



Route::get("/bunbougus/edit/{bunbougu}", "App\Http\Controllers\BunbouguController@edit")
    ->name("bunbougu.edit");

Route::put("/bunbougus/edit/{bunbougu}", "App\Http\Controllers\BunbouguController@update")
    ->name("bunbougu.update");


Route::get("/bunbougus/show/{bunbougu}", "App\Http\Controllers\BunbouguController@show")
    ->name("bunbougu.show");


Route::delete("/bunbougus/{bunbougu}", "App\Http\Controllers\BunbouguController@destroy")
    ->name("bunbougu.destroy");
