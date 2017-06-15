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
    return view('layouts.master');
});
Route::get('/person/create','PersonController@index');
Route::get('/person/finder','PersonController@index');

Route::post('/api/person/create','PersonController@store');
Route::get('/api/person/get','PersonController@getPersonProfile');

Route::post('/api/collection/create','CollectionController@create');
Route::get('/api/collection/get','CollectionController@get');
Route::post('/api/collection/delete','CollectionController@delete');


// collection_category
Route::get('/api/collection/category/get','CollectionCategoryController@get');


// collection reports
Route::get('/collection/view','CollectionController@index');
Route::get('/collection/reports','CollectionController@index');
Route::get('/collection/reports/orlisting','CollectionController@reports_orlisting');


// transaction reports
Route::get('/transaction/reports/comparative','TransactionController@comparative');


// transaction post
Route::post('/api/transaction/post','TransactionController@post');


// expenses
Route::get('/expense/view','ExpenseController@index');
Route::get('/api/expense/get','ExpenseController@get');

// Route::group(['prefix'=>'api/person'], function() {
// 	Route::get('/get',[
// 		'as'=>'getPersonProfile',
// 		'uses'=> 'PersonController@getPersonProfile'
// 	]);
// });
// Route::get('/person/create','PersonController@index');
// Route::get('/person/finder','PersonController@store');
// Route::post('/api/person/create','PersonController@create');

// Route::group(['middleware' => 'web'], function() {

// });
// Route::group(['middleware' => ['web']], function () {

// });