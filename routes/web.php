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

Route::get('/', 'GenInfoController@about');
Route::get('/gardens', 'GardensController@index');
Route::get('/harvest', 'GardensController@news');
Route::get('/contact', 'GenInfoController@index');
Route::get('/about', 'GenInfoController@about');
Route::get('/gardens/{garden}/{crop}/delete', 'CropsController@delete');
//for create new garden
Route::get('/gardens/{garden}/{crop}/update', 'CropsController@update');
Route::post('/gardens/{garden}', 'CropsController@store');
Route::get('/gardens/create', 'GardensController@create');
Route::post('/gardens', 'GardensController@store');
Route::get('/gardens/{id}', 'GardensController@detail');
Route::get('/gardens/{id}/create', 'CropsController@create');
Route::post('/gardens/{id}/{crop}/delete', 'CropsController@delete2');
Route::post('/gardens/{id}', 'CropsController@store');

Auth::routes();
Route::get('/home', 'GardensController@index');


