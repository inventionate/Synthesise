<?php namespace Synthesise\Providers;

use Illuminate\Routing\Router;
use Illuminate\Routing\Stack\Builder as Stack;
use Illuminate\Foundation\Support\Providers\AppServiceProvider as ServiceProvider;

class AppServiceProvider extends ServiceProvider {

	/**
	 * All of the application's route middleware keys.
	 *
	 * @var array
	 */
	protected $middleware = [
		'auth' 				=> 'Synthesise\Http\Middleware\AuthMiddleware',
		'auth.basic' 	=> 'Synthesise\Http\Middleware\BasicAuthMiddleware',
		'csrf' 				=> 'Synthesise\Http\Middleware\CsrfMiddleware',
		'guest' 			=> 'Synthesise\Http\Middleware\GuestMiddleware',
		'admin' 			=> 'Synthesise\Http\Middleware\AdminMiddleware',
	];

	/**
	 * The application's middleware stack.
	 *
	 * @var array
	 */
	protected $stack = [
		'Synthesise\Http\Middleware\MaintenanceMiddleware',
		'Illuminate\Cookie\Middleware\Guard',
		'Illuminate\Cookie\Middleware\Queue',
		'Illuminate\Session\Middleware\Reader',
		'Illuminate\Session\Middleware\Writer',
		'Illuminate\View\Middleware\ErrorBinder',
		'Synthesise\Http\Middleware\CsrfMiddleware',
	];

	/**
	 * Build the application stack based on the provider properties.
	 *
	 * @return void
	 */
	public function stack()
	{
		$this->app->stack(function(Stack $stack, Router $router)
		{
			return $stack
				->middleware($this->stack)->then(function($request) use ($router)
				{
					return $router->dispatch($request);
				});
			});
	}

}
