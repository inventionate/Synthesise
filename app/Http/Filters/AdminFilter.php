<?php namespace Synthesise\Http\Filters;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;

use Illuminate\Support\Facades\Auth;

class AdminFilter {

	/**
	 * Run the request filter.
	 *
	 * @param  Route  $route
	 * @param  Request  $request
	 * @return mixed
	 */
	public function filter(Route $route, Request $request)
	{
		// Wenn diese Abfrage WAHR ist wird auf das Dashboard weitergeleitet.
		if( Auth::user()->role != 'Admin' )
		{
			return redirect('dashboard');
		}
	}

}
