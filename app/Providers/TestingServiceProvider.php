<?php namespace Synthesise\Providers;

use Illuminate\Support\ServiceProvider;

class TestingServiceProvider extends ServiceProvider {

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		if ($this->app->environment() === 'testing')
    {
      $this->app['config']['session.driver'] = 'native';
    }
	}

}
