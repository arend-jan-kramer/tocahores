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

Route::get('/', 'LockScreen@login');
Route::post('/', 'LockScreen@unlock');

Route::middleware(['lock'])->group(function () {
  // Bekijk afdelingen
  Route::get('/{id}', 'pattientController@index');

  // Patienten dossiers
  Route::post('/dossier', 'pattientController@dossier');
  Route::get('/dossier/{id}', 'pattientController@getPatient');
  Route::get('/dossier/{patient_id}/{dossier_id}', 'pattientController@getPatientDossier');
  Route::post('/dossier/create', 'pattientController@create');
  Route::post('/dossier/update', 'pattientController@update');
  Route::post('/dossier/remove', 'pattientController@dismisPatient');

  // Personeel toevoegen aan mailing lijst
  Route::post('/user/new', 'emailController@newuser');
  Route::post('/user/delete', 'emailController@deleteuser');
});
