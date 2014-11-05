<?php namespace Synthesise\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\Routing\Middleware;

//use Illuminate\Support\Facades\Auth;

class IsAdmin implements Middleware {

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
		if( $this->auth->user()->role != 'Admin' )
		{
			return new RedirectResponse(url('/'));
		}

		return $next($request);
	}

}
