<?php namespace Synthesise\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel {

	/**
	 * The application's HTTP middleware stack.
	 *
	 * @var array
	 */
	protected $middleware = [
		'Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode',
		'Illuminate\Cookie\Middleware\EncryptCookies',
		'Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse',
		'Illuminate\Session\Middleware\StartSession',
		'Illuminate\View\Middleware\ShareErrorsFromSession',
		'Synthesise\Http\Middleware\VerifyCsrfToken',
	];

	/**
	* The application's route middleware.
	*
	* @var array
	*/
	protected $routeMiddleware = [
		'auth' 				=> 'Synthesise\Http\Middleware\Authenticate',
		'auth.basic' 	=> 'Illuminate\Auth\Middleware\AuthenticateWithBasicAuth',
		'guest' 			=> 'Synthesise\Http\Middleware\RedirectIfAuthenticated',
		'admin' 			=> 'Synthesise\Http\Middleware\IsAdmin',
	];

}
