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


Route::get('/', 'App\Http\Controllers\MainController@index')->name('main.index');
Route::get('/men/{user}', 'App\Http\Controllers\ManController@index')->name('men.index');
Route::get('/about', 'App\Http\Controllers\AboutController@index')->name('about.index');
Route::get('/men/{user}/{men}', 'App\Http\Controllers\ManController@show')->name('men.show');
Route::post('/men/', 'App\Http\Controllers\ManController@transfer')->name('men.transfer');



//Route::post('/men', 'App\Http\Controllers\ManController@index')->name('men.index');
//Route::get('/men/{user}/create', 'App\Http\Controllers\ManController@create')->name('men.create');
//Route::post('/men/', 'App\Http\Controllers\ManController@store')->name('men.store');
//Route::get('/men/{men}/edit', 'App\Http\Controllers\ManController@edit')->name('men.edit');
//Route::patch('/men/{men}', 'App\Http\Controllers\ManController@update')->name('men.update');
//Route::delete('/men/{men}', 'App\Http\Controllers\ManController@destroy')->name('men.delete');
//Route::get('/men/update', 'App\Http\Controllers\ManController@update');
//Route::get('/men/delete', 'App\Http\Controllers\ManController@delete');

