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
        $piwik_url = env('PIWIK_URL');

        $piwik_site_id = env('PIWIK_SITE_ID');

        View::share('piwik_url', $piwik_url);
        View::share('piwik_site_id', $piwik_site_id);
    }

    /**
     * Register any application services.
     */
    public function register()
    {
        //
    }
}
