<?php

namespace Synthesise\Providers;

use Illuminate\Support\ServiceProvider;
use Synthesise\Extensions\Ldap;
use Synthesise\Extensions\Parser;
use Synthesise\Extensions\Analytics;

class ExtensionServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // LDAP
        $this->app->bind(['Synthesise\Extensions\Contracts\Ldap', 'Synthesise\Extensions\Ldap'], function () {

            $domain = $this->app['config']->get('auth.ldap.domain');

            $baseDn = $this->app['config']->get('auth.ldap.baseDn');

            return new Ldap($domain, $baseDn);

        });

        // PARSER
        $this->app->bind('parser', function () {
            return new Parser();
        });

        // ANALYTICS
        $this->app->bind('analytics', function () {

            $tokenAuth = $this->app['config']->get('auth.analytics.tokenAuth');

            $baseUrl = $this->app['config']->get('auth.analytics.baseUrl');

            return new Analytics($tokenAuth, $baseUrl);
        });
    }
}
