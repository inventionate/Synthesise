<?php

namespace Synthesise\Providers;

use Illuminate\Support\ServiceProvider;

use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        // Share Piwik URL and setSiteId
        $piwik_url = config('auth.analytics.baseUrl');
        $piwik_site_id = config('auth.analytics.site_id');

        View::share('piwik_url', $piwik_url);
        View::share('piwik_site_id', $piwik_site_id);

        // Share Version
        $synthesise_version = config('app.synthesise_version');

        View::share('synthesise_version', $synthesise_version);
    }

    /**
     * Register any application services.
     */
    public function register()
    {
        //
    }
}
