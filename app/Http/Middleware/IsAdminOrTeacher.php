<?php namespace Synthesise\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\RedirectResponse;

class IsAdminOrTeacher {

	/**
	* The Guard implementation.
	*
	* @var Guard
	*/
	protected $auth;

	/**
	* Create a new filter instance.
	*
	* @param  Guard  $auth
	* @return void
	*/
	public function __construct(Guard $auth)
	{
		$this->auth = $auth;
	}

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		// Wenn diese Abfrage WAHR ist wird auf das Dashboard weitergeleitet.
		if( !in_array($this->auth->user()->role, ['Admin', 'Teacher']) )
		{
			return new RedirectResponse(url('/'));
		}

		return $next($request);
	}

}
