<?php namespace Synthesise\Extensions;

use Illuminate\Support\ServiceProvider;

class ExtensionsServiceProvider extends ServiceProvider {

	public function register()
	{

		$this->app->bindShared('ldap', function()
		{

			$domain = $this->app['config']->get('auth.ldap.domain');

			$baseDn = $this->app['config']->get('auth.ldap.baseDn');

			return new Ldap($domain, $baseDn);

		});

		$this->app->bindShared('parser', function()
		{
			return new Parser;
		});

		$this->app->bindShared('asset', function()
		{
			return new AssetBuilder;
		});

	}

}
