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

Route::get('person/list', 'Person\PersonController@getList');

Route::group(['middleware' => ['web','admin.login'],'prefix'=>'person','namespace'=>'Person'], function () {
    /*Person management*/

    Route::any('add', 'PersonController@add');

    Route::any('delete', 'PersonController@delete');

    Route::any('update', 'PersonController@update');
});