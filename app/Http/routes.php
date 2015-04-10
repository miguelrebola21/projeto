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



Route::group(array('before' => 'auth'), function() {

Route::get('homebanking', 'HBController@index');
Route::post('homebanking/mainview/matriz', array('as' => 'matriz', 'uses' => 'HBController@matriz'));
Route::get('homebanking/mainview', array('as' => 'mainview', 'uses' => 'HBController@index'));
Route::get('homebanking/sendcorreio', array('as' => 'sendcorreio', 'uses' => 'HBController@sendcorreio'));
Route::post('homebanking/sendcorreio', array('as' => 'sendcorreio', 'uses' => 'HBController@storecorreio'));

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

Route::get('admin/clientes', array('as' => 'a_clientes', 'uses' => 'AdminController@clientes'));
Route::get('admin/clientes/edit/{id?}', array('as' => 'edit_clientes', 'uses' => 'AdminController@editclientes'));
Route::post('admin/clientes/update', array('as' => 'update_clientes', 'uses' => 'AdminController@updateclientes'));
Route::get('admin/contas', array('as' => 'a_contas', 'uses' => 'AdminController@contas'));
Route::post('admin/contas/update', array('as' => 'update_contas', 'uses' => 'AdminController@updatecontas'));
Route::get('admin/contas/edit/{id?}', array('as' => 'edit_contas', 'uses' => 'AdminController@editcontas'));
Route::get('admin/homebanking', array('as' => 'a_homebankings', 'uses' => 'AdminController@homebankings'));
Route::get('admin/suporte', array('as' => 'a_suporte', 'uses' => 'AdminController@suporte'));

});

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
