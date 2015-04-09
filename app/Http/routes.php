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

Route::get('home', array('as' => 'home', 'uses' => 'PageController@index'));

Route::get('agencias', 'PageController@agencias');

Route::get('empresa', 'PageController@empresa');

Route::get('joinus', 'PageController@joinus');
Route::post('joinus','PageController@store');

Route::get('faq', 'PageController@faq');

Route::get('local', 'PageController@local');

Route::get('servicos', 'PageController@servicos');

Route::get('suport', 'PageController@suport');
Route::post('suport', 'PageController@sendsuport');

Route::get('contactos', 'PageController@contactos');



Route::get('login', 'PageController@showlogin');

Route::post('login', ' PageController@dologin');

Route::get('homebanking/logout', array('as' => 'logout', 'uses' => 'PageController@dologout'));

Route::get('joinhomebanking', array('as' => 'signhb', 'uses' => 'PageController@signhb'));

Route::get('homebanking', 'HBController@index');
Route::post('homebanking/mainview/matriz', array('as' => 'matriz', 'uses' => 'HBController@matriz'));
Route::get('homebanking/mainview', array('as' => 'mainview', 'uses' => 'HBController@index'));
Route::get('homebanking/cons', array('as' => 'cons', 'uses' => 'HBController@cons'));
Route::post('homebanking/cons', array('as' => 'cons', 'uses' => 'HBController@applycons'));
Route::get('homebanking/pagamentos/tele', array('as' => 'tele', 'uses' => 'HBController@tele'));
Route::get('homebanking/pagamentos/fac', array('as' => 'fac', 'uses' => 'HBController@fac'));
Route::get('homebanking/pagamentos/presta', array('as' => 'presta', 'uses' => 'HBController@presta'));
Route::post('homebanking/pagamentos/tele', array('as' => 'tele', 'uses' => 'HBController@endtele'));
Route::post('homebanking/pagamentos/fac', array('as' => 'fac', 'uses' => 'HBController@endfac'));
Route::post('homebanking/pagamentos/presta', array('as' => 'presta', 'uses' => 'HBController@endpresta'));
Route::get('homebanking/transf', array('as' => 'transf', 'uses' => 'HBController@transf'));
Route::post('homebanking/transf', array('as' => 'transf', 'uses' => 'HBController@endtransf'));
Route::get('validation', array('as' => 'validation', 'uses' => 'HBController@validation'));
Route::post('validation', array('as' => 'validation', 'uses' => 'HBController@testvalidation'));

Route::get('funcionarios', array('as' => 'funcionarios', 'uses' => 'FunController@index'));


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
