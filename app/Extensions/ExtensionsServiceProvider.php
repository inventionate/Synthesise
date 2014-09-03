<?php namespace Extensions;

use Illuminate\Support\ServiceProvider;

class ExtensionsServiceProvider extends ServiceProvider {

	public function register()
	{
		$this->app->singleton('ldap', function()
		{
			return new Ldap;
		});
		
		$this->app->singleton('parser', function()
		{
			return new Parser;
		});
	}

}