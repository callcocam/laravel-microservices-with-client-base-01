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
Route::group(['prefix'=>'/admin'], function ($router){
    Auth::routes();
    $router->get('/{vue_capture?}',"AdminController@index")->middleware(['auth:sanctum'])->where('vue_capture', '[\/\w\.\,\-]*')->name("admin");
});
Route::get('/home', 'HomeController@index')->name('home');
