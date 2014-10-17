<?php namespace Synthesise\Providers;

use InspireCommand;
use Illuminate\Support\ServiceProvider;

class ArtisanServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = true;

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->commands('Synthesise\Console\InspireCommand');
		$this->commands('Synthesise\Console\UpdateUserTableCommand');

	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return [
			'Synthesise\Console\InspireCommand',
			'Synthesise\Console\UpdateUserTableCommand',
		];
	}

}
