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
//home
Route::get('/','HomeController@index');

Route::group(['middleware' => ['admin']],function(){

	Route::get('/dashboard','DashboardController@index');

	//item type
	Route::get('/maintenance/item-type','ItemTypeController@index');
	Route::get('/ajax/get-item-type','ItemTypeController@getType');

	Route::post('/item-type/insert','ItemTypeController@save');
	Route::post('/item-type/update','ItemTypeController@update');
	Route::post('/item-type/delete','ItemTypeController@delete');

	//item category
	Route::get('/maintenance/item-category','ItemCategoryController@index');
	Route::get('/ajax/get-item-category','ItemCategoryController@getType');

	Route::post('/item-category/insert','ItemCategoryController@save');
	Route::post('/item-category/update','ItemCategoryController@update');
	Route::post('/item-category/delete','ItemCategoryController@delete');

	//item
	Route::get('/items','ItemController@index');
	Route::get('/ajax/get-item-gettype','ItemController@getType');
	Route::get('/ajax/get-item','ItemController@getItem');
	Route::get('/ajax/get-stock','ItemController@getStock');

	Route::post('/item/insert','ItemController@save');
	Route::post('/item/update','ItemController@update');
	Route::post('/item/delete','ItemController@delete');
	Route::post('/item/addstock','ItemController@addStock');
	Route::post('/report/sales','PrintController@sales');
	Route::get('/report/inventory','PrintController@inventory');
});

//pay-out
Route::post('/checkout','HomeController@checkout');
// receipt
Route::get('/receipt','PrintController@receipt');

//report

//login
Route::get('/login','HomeController@login');
Route::post('/login/pre','HomeController@prelogin');
Route::get('/logout','HomeController@logout');
