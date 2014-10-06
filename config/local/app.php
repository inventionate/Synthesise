<?php

return [

	/*
	|--------------------------------------------------------------------------
	| Application Debug Mode
	|--------------------------------------------------------------------------
	|
	| When your application is in debug mode, detailed error messages with
	| stack traces will be shown on every error that occurs within your
	| application. If disabled, a simple generic error page is shown.
	|
	*/

	'debug' => true,

	/*
	|--------------------------------------------------------------------------
	| Autoloaded Service Providers
	|--------------------------------------------------------------------------
	|
	| The service providers listed here will be automatically loaded on the
	| request to your application. Feel free to add your own services to
	| this array to grant expanded functionality to your applications.
	|
	*/

	'providers' => [

		/*
		* Application Service Providers...
		*/
		'Synthesise\Providers\AppServiceProvider',
		'Synthesise\Providers\ArtisanServiceProvider',
		'Synthesise\Providers\ErrorServiceProvider',
		'Synthesise\Providers\EventServiceProvider',
		'Synthesise\Providers\FilterServiceProvider',
		'Synthesise\Providers\LogServiceProvider',
		'Synthesise\Providers\RouteServiceProvider',


		/*
		* Repositry Service Provider.
		*/
		'Synthesise\Providers\RepositoryServiceProvider',

		/*
		* Extensions ServiceProvides.
		* Kleine Erweiterungsklassen (keine Pakete) registrieren.
		*
		*/
		'Synthesise\Providers\ExtensionServiceProvider',

		/*
		* ServiceProvider für Pakete.
		*
		*/
		'Jenssegers\Agent\AgentServiceProvider',
		'Thujohn\Pdf\PdfServiceProvider',
		'Illuminate\Html\HtmlServiceProvider',

		/*
		* Dev ServiceProvider für Pakete.
		*
		*/

		'Way\Generators\GeneratorsServiceProvider',

		/*
		* Laravel Framework Service Providers...
		*/
		'Illuminate\Foundation\Providers\ArtisanServiceProvider',
		'Illuminate\Auth\AuthServiceProvider',
		'Illuminate\Cache\CacheServiceProvider',
		'Illuminate\Foundation\Providers\ConsoleSupportServiceProvider',
		'Illuminate\Cookie\CookieServiceProvider',
		'Illuminate\Database\DatabaseServiceProvider',
		'Illuminate\Encryption\EncryptionServiceProvider',
		'Illuminate\Filesystem\FilesystemServiceProvider',
		'Illuminate\Foundation\Providers\FoundationServiceProvider',
		'Illuminate\Hashing\HashServiceProvider',
		'Illuminate\Log\LogServiceProvider',
		'Illuminate\Mail\MailServiceProvider',
		'Illuminate\Pagination\PaginationServiceProvider',
		'Illuminate\Queue\QueueServiceProvider',
		'Illuminate\Redis\RedisServiceProvider',
		'Illuminate\Auth\Reminders\ReminderServiceProvider',
		'Illuminate\Session\SessionServiceProvider',
		'Illuminate\Translation\TranslationServiceProvider',
		'Illuminate\Validation\ValidationServiceProvider',
		'Illuminate\View\ViewServiceProvider'

	],

	/*
	|--------------------------------------------------------------------------
	| Service Provider Manifest
	|--------------------------------------------------------------------------
	|
	| The service provider manifest is used by Laravel to lazy load service
	| providers which are not needed for each request, as well to keep a
	| list of all of the services. Here, you may set its storage spot.
	|
	*/

	'manifest' => storage_path().'/framework',

	/*
	|--------------------------------------------------------------------------
	| Class Aliases
	|--------------------------------------------------------------------------
	|
	| This array of class aliases will be registered when this application
	| is started. However, feel free to register as many as you wish as
	| the aliases are "lazy" loaded so they don't hinder performance.
	|
	*/

	'aliases' => [

		'App'       => 'Illuminate\Support\Facades\App',
		'Artisan'   => 'Illuminate\Support\Facades\Artisan',
		'Auth'      => 'Illuminate\Support\Facades\Auth',
		'Blade'     => 'Illuminate\Support\Facades\Blade',
		'Cache'     => 'Illuminate\Support\Facades\Cache',
		'Config'    => 'Illuminate\Support\Facades\Config',
		'Cookie'    => 'Illuminate\Support\Facades\Cookie',
		'Crypt'     => 'Illuminate\Support\Facades\Crypt',
		'DB'        => 'Illuminate\Support\Facades\DB',
		'Event'     => 'Illuminate\Support\Facades\Event',
		'File'      => 'Illuminate\Support\Facades\File',
		'Hash'      => 'Illuminate\Support\Facades\Hash',
		'Input'     => 'Illuminate\Support\Facades\Input',
		'Lang'      => 'Illuminate\Support\Facades\Lang',
		'Log'       => 'Illuminate\Support\Facades\Log',
		'Mail'      => 'Illuminate\Support\Facades\Mail',
		'Paginator' => 'Illuminate\Support\Facades\Paginator',
		'Password'  => 'Illuminate\Support\Facades\Password',
		'Queue'     => 'Illuminate\Support\Facades\Queue',
		'Redirect'  => 'Illuminate\Support\Facades\Redirect',
		'Redis'     => 'Illuminate\Support\Facades\Redis',
		'Request'   => 'Illuminate\Support\Facades\Request',
		'Response'  => 'Illuminate\Support\Facades\Response',
		'Route'     => 'Illuminate\Support\Facades\Route',
		'Schema'    => 'Illuminate\Support\Facades\Schema',
		'Session'   => 'Illuminate\Support\Facades\Session',
		'URL'       => 'Illuminate\Support\Facades\URL',
		'Validator' => 'Illuminate\Support\Facades\Validator',
		'View'      => 'Illuminate\Support\Facades\View',

		/*
		* Repositories Facades.
		*
		*/
		'FAQ'				=> 'Synthesise\Repositories\Facades\Faq',
		'Note'			=> 'Synthesise\Repositories\Facades\Note',
		'Video'			=> 'Synthesise\Repositories\Facades\Video',
		'User'			=> 'Synthesise\Repositories\Facades\User',

		/*
		* Extensions Facades.
		*
		*/
		'LDAP'			=> 'Synthesise\Extensions\Facades\Ldap',
		'Parser'		=> 'Synthesise\Extensions\Facades\Parser',
		'Asset'			=> 'Synthesise\Extensions\Facades\AssetBuilder',

		/**
		* Facades für Pakete.
		*
		*/
		'Agent'     => 'Jenssegers\Agent\Facades\Agent',
		'PDF' 			=> 'Thujohn\Pdf\PdfFacade',
		'Form'			=> 'Illuminate\Html\FormFacade'

	],

];
