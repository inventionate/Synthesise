<?php namespace Synthesise\Providers;

use Exception;
use Illuminate\Contracts\Logging\Log;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Exception\Handler;
use Illuminate\Support\Facades\View;

class ErrorServiceProvider extends ServiceProvider {

	/**
	 * Register any error handlers.
	 *
	 * @param  Handler  $handler
	 * @param  Log  $log
	 * @return void
	 */
	public function boot(Handler $handler, Log $log)
	{
		// Here you may handle any errors that occur in your application, including
		// logging them or displaying custom views for specific errors. You may
		// even register several error handlers to handle different types of
		// exceptions. If nothing is returned, the default error view is
		// shown, which includes a detailed stack trace during debug.

		// @todo Error Handling verbessern

		$handler->error(function(Exception $e) use ($log)
		{
			$log->error($e);
			// @todo hier so konfigurieren, dass die entsprechenden Error angezeigt werden.
			// @todo außerdem so konfigurieren, dass sie nur in der Produktivumgebung angezeigt werden.
			//return View::make('errors.tokenmismatch');
		});
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

}
