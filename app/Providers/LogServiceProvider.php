<?php namespace Synthesise\Providers;

use Illuminate\Contracts\Logging\Log;
use Illuminate\Support\ServiceProvider;

class LogServiceProvider extends ServiceProvider {

	/**
	 * Configure the application's logging facilities.
	 *
	 * @param  Log  $log
	 * @return void
	 */
	public function boot(Log $log)
	{
		$log->useFiles(storage_path().'/framework/logs/laravel.log');
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
