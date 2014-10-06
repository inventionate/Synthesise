<?php namespace Synthesise\Providers;

use Illuminate\Foundation\Support\Providers\FilterServiceProvider as ServiceProvider;

class FilterServiceProvider extends ServiceProvider {

	/**
	 * The filters that should run before all requests.
	 *
	 * @var array
	 */
	protected $before = [
		'Synthesise\Http\Filters\MaintenanceFilter',
		'Synthesise\Http\Filters\HttpsFilter',
	];

	/**
	 * The filters that should run after all requests.
	 *
	 * @var array
	 */
	protected $after = [
		//
	];

	/**
	 * All available route filters.
	 *
	 * @var array
	 */
	protected $filters = [
		'auth' => 'Synthesise\Http\Filters\AuthFilter',
		'auth.basic' => 'Synthesise\Http\Filters\BasicAuthFilter',
		'csrf' => 'Synthesise\Http\Filters\CsrfFilter',
		'guest' => 'Synthesise\Http\Filters\GuestFilter',
	];

}
