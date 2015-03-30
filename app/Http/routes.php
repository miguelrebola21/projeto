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


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
