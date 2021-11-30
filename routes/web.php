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
   // return view('instagram.login');
   return redirect('/login');
});


Route::get('/main', "\App\Http\Controllers\HomeController@index");
Route::get('/login', "\App\Http\Controllers\InstagramController@login");
Route::post('/instagram/login', "\App\Http\Controllers\InstagramController@instagram_login");
Route::get('/delete/{id}', "\App\Http\Controllers\HomeController@destroy");
Route::get('/cron', "\App\Http\Controllers\CronController@run");
Route::get('/logs', "\App\Http\Controllers\HomeController@logs");

