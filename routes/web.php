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
   //return redirect('/web/home');
});
Route::group(['middleware' => ['AuthCheck']], function(){

Route::get('/auth/login', "\App\Http\Controllers\InstagramController@login");

Route::get('/dashboard/main', "\App\Http\Controllers\HomeController@index");
Route::get('/dashboard/logs/{username}', "\App\Http\Controllers\HomeController@logs");
});

Route::get('/dashboard/delete/{id}', "\App\Http\Controllers\HomeController@destroy");
Route::get('/auth/logout', "\App\Http\Controllers\InstagramController@logout");
Route::get('/dashboard/logs_all', "\App\Http\Controllers\HomeController@logs_all");
Route::post('/instagram/login', "\App\Http\Controllers\InstagramController@instagram_login");
Route::get('/cron', "\App\Http\Controllers\CronController@run");
Route::get('/test/{id}', "\App\Http\Controllers\InstagramController@test");


