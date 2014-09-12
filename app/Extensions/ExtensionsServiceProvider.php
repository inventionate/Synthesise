<?php namespace Synthesise\Extensions;

use Illuminate\Support\ServiceProvider;

class ExtensionsServiceProvider extends ServiceProvider {

	public function register()
	{

		$this->app->singleton('ldap', function()
		{

			$domain = $this->app['config']->get('auth.ldap.domain');

			$baseDn = $this->app['config']->get('auth.ldap.baseDn');

			return new Ldap($domain, $baseDn);

		});

		$this->app->singleton('parser', function()
		{
			return new Parser;
		});
	}

}
