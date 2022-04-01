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

Route::get('/', '\App\Http\Controllers\HomeController@home')->name('home');

Route::get('articles', '\App\Http\Controllers\ArticleController@index')->name('articles');

Route::get('articles/{slug}', '\App\Http\Controllers\ArticleController@show')->name('article');

Route::get('tag/{slug}', '\App\Http\Controllers\TagController@index')->name('tag');
