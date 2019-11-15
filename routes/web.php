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
Route::pattern('id','[0-9]+');


//product operations Routes
Route::get('/','ProductController@index');

Route::delete('del/product/{id}','ProductController@destroy');

Route::get('add/product','ProductController@create');

Route::post('add/product','ProductController@store');

Route::get('update/product/{id}','ProductController@edit');

Route::post('update/product/{id}','ProductController@update');


//categories operations Routes
Route::get('all/categories','CategoryController@index');

Route::delete('del/category/{id}','CategoryController@destroy');

Route::get('add/category','CategoryController@create');

Route::post('add/category','CategoryController@store');

Route::get('update/category/{id}','CategoryController@edit');

Route::post('update/category/{id}','CategoryController@update');


