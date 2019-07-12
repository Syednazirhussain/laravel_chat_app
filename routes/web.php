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


Route::get('/chats', 'ChatsController@index')->name('chats');

Route::get('/messages', 'ChatsController@fetchMessage');
Route::post('/messages', 'ChatsController@sendMessage');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/roles', 'RolesController@index')->name('roles.index');
Route::get('/roles/create', 'RolesController@create')->name('roles.create');
Route::post('/roles', 'RolesController@store')->name('roles.store');
Route::get('/roles/{id}', 'RolesController@edit')->name('roles.edit');
Route::get('/roles/show/{id}', 'RolesController@show')->name('roles.show');
Route::put('/roles/{id}', 'RolesController@update')->name('roles.update');
Route::delete('/roles/{id}', 'RolesController@destroy')->name('roles.delete');
