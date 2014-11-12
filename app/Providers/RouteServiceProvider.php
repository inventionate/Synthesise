<?php namespace Synthesise\Providers;

use Illuminate\Routing\Router;
use Illuminate\Contracts\Routing\UrlGenerator;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider {

	/**
	* The controllers to scan for route annotations.
	*
	* @var array
	*/
	protected $scan = [
		'Synthesise\Http\Controllers\AuthController',
		'Synthesise\Http\Controllers\AnalyticsController',
		'Synthesise\Http\Controllers\DashboardController',
		'Synthesise\Http\Controllers\DownloadController',
		'Synthesise\Http\Controllers\ContactController',
		'Synthesise\Http\Controllers\FaqController',
		'Synthesise\Http\Controllers\ImprintController',
		'Synthesise\Http\Controllers\LectionController',
		'Synthesise\Http\Controllers\API\MessageController',
	];

	/**
	 * All of the application's route middleware keys.
	 *
	 * @var array
	 */
	protected $middleware = [
		'auth' 				=> 'Synthesise\Http\Middleware\Authenticate',
		'auth.basic' 	=> 'Illuminate\Auth\Middleware\AuthenticateWithBasicAuth',
		'guest' 			=> 'Synthesise\Http\Middleware\RedirectIfAuthenticated',
		'admin' 			=> 'Synthesise\Http\Middleware\IsAdmin',
		'secure' 			=> 'Synthesise\Http\Middleware\Secure',
	];

	/**
	 * Called before routes are registered.
	 *
	 * Register any model bindings or pattern based filters.
	 *
	 * @param  \Illuminate\Routing\Router  $router
	 * @param  \Illuminate\Contracts\Routing\UrlGenerator  $url
	 * @return void
	 */
	public function before(Router $router, UrlGenerator $url)
	{
		$url->setRootControllerNamespace('Synthesise\Http\Controllers');
	}

	/**
	 * Define the routes for the application.
	 *
	 * @param  \Illuminate\Routing\Router  $router
	 * @return void
	 */
	public function map(Router $router)
	{
		// $router->group(['namespace' => 'App\Http\Controllers'], function($router)
		// {
		// 	require app_path('Http/routes.php');
		// });
	}

}
