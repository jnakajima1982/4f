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

Route::get('/', 'App\Http\Controllers\TrendKeywordController@index')->name('trend.index');
Route::get('trend/{trend_id?}', 'App\Http\Controllers\TrendKeywordController@show')->name('trend.show');
Route::get('trendGet', 'App\Http\Controllers\TrendKeywordController@createTrendKeyword');
