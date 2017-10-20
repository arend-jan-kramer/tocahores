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

Route::get('/', 'pattientController@lock');
Route::post('/', 'pattientController@unlock');
Route::get('/{id}', 'pattientController@index');
Route::post('/dossier', 'pattientController@dossier');

Route::get('/dossier/{id}', 'pattientController@getPatient');

Route::post('/dossier/create', 'pattientController@create');
Route::post('/dossier/update', 'pattientController@update');
Route::post('/user/new', 'pattientController@newuser');
Route::post('/user/delete', 'pattientController@deleteuser');
