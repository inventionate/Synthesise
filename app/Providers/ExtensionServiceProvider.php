<?php namespace Synthesise\Providers;

use Illuminate\Support\ServiceProvider;

use Synthesise\Extensions\Ldap;
use Synthesise\Extensions\Parser;
use Synthesise\Extensions\AssetBuilder;
use Synthesise\Extensions\Analytics;

class ExtensionServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		//
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		// LDAP
		$this->app->bindShared('ldap', function()
		{

			$domain = $this->app['config']->get('auth.ldap.domain');

			$baseDn = $this->app['config']->get('auth.ldap.baseDn');

			return new Ldap($domain, $baseDn);

		});

		// PARSER
		$this->app->bindShared('parser', function()
		{
			return new Parser;
		});

		// ASSET
		$this->app->bindShared('asset', function()
		{
			return new AssetBuilder;
		});

		// ANALYTICS
		$this->app->bindShared('analytics', function()
		{
			return new Analytics;
		});
	}

}
