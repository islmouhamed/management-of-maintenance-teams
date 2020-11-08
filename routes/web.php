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
Route::get('/welcome', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('contactus',function () {
    return view('contactus');
});

Route::post('contactus/sent', 'TaskController@store');

Route::get('/user/create', 'UserController@create');
Route::get('/user', 'UserController@index')->middleware('auth');
Route::get('/user/index', 'UserController@index')->middleware('auth');
Route::post('/user/store', 'UserController@store')->middleware('auth');
Route::get('/user/{id}/edit', 'UserController@edit')->middleware('auth');
Route::put('/user/{id}', 'UserController@update')->middleware('auth');
Route::delete('/user/{id}', 'UserController@destroy')->middleware('auth');

Route::get('/task/index', 'TaskController@index')->middleware('auth');
Route::get('/task/{id}/index_user', 'TaskController@index_user')->middleware('auth');
Route::delete('/task/{id}', 'TaskController@destroy')->middleware('auth');
Route::get('/task/{id}/charge', 'TaskController@charge')->middleware('auth');

Route::put('/task/{id}/appoint', 'TaskController@appoint')->middleware('auth');
Route::get('/task/{id}/profil', 'TaskController@profil')->middleware('auth');

Route::post('/task/{id}/finish', 'TaskController@finish')->middleware('auth');
Route::get('/user/{id}', 'UserController@show')->middleware('auth');