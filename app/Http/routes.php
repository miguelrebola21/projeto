<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'PageController@index');

Route::get('home', 'PageController@index');

Route::get('agencias', 'PageController@agencias');

Route::get('empresa', 'PageController@empresa');

Route::get('joinus', 'PageController@joinus');

Route::get('faq', 'PageController@faq');

Route::get('local', 'PageController@local');

Route::get('servicos', 'PageController@servicos');

Route::get('suport', 'PageController@suport');

Route::get('contactos', 'PageController@contactos');

Route::post('joinus','PageController@store');

Route::get('login', 'PageController@showlogin');

Route::post('login', ' PageController@dologin');

Route::get('logout', 'PageController@dologout');




Route::get('homebanking', 'HBController@index');
Route::get('/mainview', 'HBController@index');
Route::get('/cons', 'HBController@cons');
Route::post('/cons', 'HBController@applycons');
Route::get('/pay', 'HBController@pay');
Route::get('/transf', 'HBController@transf');
Route::post('/transf', 'HBController@endtransf');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
