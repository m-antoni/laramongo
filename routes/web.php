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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/mongo', 'MongoDBController@mongoConnect');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/form/{_id?}', 'PostController@form')->name('post.form');
Route::post('/form/store','PostController@store')->name('post.save');
Route::put('/form/update/{_id}','PostController@update')->name('post.update');
Route::get('/form/delete/{_id}','PostController@delete')->name('post.delete');

