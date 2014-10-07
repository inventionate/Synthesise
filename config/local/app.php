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

	]

];
