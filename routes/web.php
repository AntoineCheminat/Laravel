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

Route::get('home', 'HomeController@index');

Route::get('/thread/{id?}', 'ThreadController@index')->name('thread');

Route::get('create', 'ThreadController@create');

Route::get('createModify', 'ThreadController@createModify');

Route::get('modify', 'ThreadController@modify')->name('modify');

Route::post('search', 'ThreadController@search');

Route::post('createThread', 'ThreadController@createThread');

Route::post('createThreadModify', 'ThreadController@createThreadModify');

Route::get('/delete/{id?}', 'ThreadController@delete')->name('delete');

Route::get('/update/{id?}', 'ThreadController@update')->name('update');

Route::post('updateThread', 'ThreadController@updateThread');
/*
 * Comments
 */
Route::post('createComment', 'ThreadController@createComment');

Route::get('/delete/comment/{id?}', 'ThreadController@deleteComment')->name('delete');

Route::get('/update/comment/{id?}', 'ThreadController@updateComment')->name('update');

Route::post('updateCom', 'ThreadController@updateCom');

Auth::routes();

