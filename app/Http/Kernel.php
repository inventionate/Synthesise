<?php

namespace Synthesise\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
      * The application's HTTP middleware stack.
      *
      * @var array
      */
     protected $middleware = [
         \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
         \Synthesise\Http\Middleware\EncryptCookies::class,
         \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
         \Illuminate\Session\Middleware\StartSession::class,
         \Illuminate\View\Middleware\ShareErrorsFromSession::class,
         \Synthesise\Http\Middleware\VerifyCsrfToken::class,
     ];

     /**
      * The application's route middleware.
      *
      * @var array
      */
     protected $routeMiddleware = [
         'auth' => \Synthesise\Http\Middleware\Authenticate::class,
         'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
         'guest' => \Synthesise\Http\Middleware\RedirectIfAuthenticated::class,
         'admin' => \Synthesise\Http\Middleware\IsAdmin::class,
     ];
}
