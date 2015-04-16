<?php namespace App\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider {

	/**
	 * This namespace is applied to the controller routes in your routes file.
	 *
	 * In addition, it is set as the URL generator's root namespace.
	 *
	 * @var string
	 */
	protected $namespace = 'App\Http\Controllers';

	/**
	 * Define your route model bindings, pattern filters, etc.
	 *
	 * @param  \Illuminate\Routing\Router  $router
	 * @return void
	 */
	public function boot(Router $router)
	{
		parent::boot($router);

		\Route::filter('require_admin', function(){
		
		$homebanking=\Auth::user();

		$cliente=$homebanking->cliente();

		$role=$cliente->roles()->get();
		$k=0;
		foreach ($role as $r){
			$idroles[$k]=($r->id);
			$k=$k+1;
		}
		$max_role=max($idroles);


		if ($max_role===42){
		  

			
		//
		}else{	
			\Flash::message('Não tem permissões.');
			return \Redirect::guest('home');
		}
		});




		\Route::filter('auth', function(){
		if (\Auth::guest()) {

		if (\Request::ajax())

		{

		$response = array( 'success' => false, 'status' => 'You do not have access to this section');

		return \Response::json($response)->setCallback(Input::get('callback'));
		} else {

		\Flash::message('Não tem permissões.');
		return \Redirect::guest('home');
		}
		}


		//
		});

	}

	/**
	 * Define the routes for the application.
	 *
	 * @param  \Illuminate\Routing\Router  $router
	 * @return void
	 */
	public function map(Router $router)
	{
		$router->group(['namespace' => $this->namespace], function($router)
		{
			require app_path('Http/routes.php');
		});
	}

}
