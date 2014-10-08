<?php namespace Synthesise\Http\Middleware;

use Closure;
use Illuminate\Contracts\Routing\Middleware;

use Illuminate\Support\Facades\Auth;

class AdminMiddleware implements Middleware {

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
		if( Auth::user()->role != 'Admin' )
		{
			return redirect('dashboard');
		}

		return $next($request);
	}

}
