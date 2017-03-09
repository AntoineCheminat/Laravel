<?php

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

//Route::get('/', function () {
//    return redirect()->route('home');
//})->name('welcome');

Route::get('/', 'HomeController@index')->name('home');

Route::post('write','HomeController@write');

Route::get('/thread/{id?}', 'ThreadController@index')->name('thread');

Route::get('create', 'ThreadController@create');

Route::post('createThread', 'ThreadController@createThread');

Route::post('createComment', 'ThreadController@createComment');

Auth::routes();

