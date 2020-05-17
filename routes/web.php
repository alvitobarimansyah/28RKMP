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

Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});

Route::get('/about', function () {
    return view('about');
});
Route::resource('post', 'PostController')->middleware('auth');
Route::resource('user', 'UsersController')->middleware('auth');
Route::resource('resep', 'ResepController')->middleware('auth');


Auth::routes();

Route::get('/home', 'HomeController@index')->middleware('auth');
