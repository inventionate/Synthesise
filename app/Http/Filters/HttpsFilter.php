<?php namespace Synthesise\Http\Filters;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\App;

class HttpsFilter {

	/**
	 * Run the Https filter.
	 *
	 * @return Redirect::secure Eine sichere URL.
	 */
	public function filter()
	{
		if( ! Request::secure() && App::environment() === 'production')

    {
        return Redirect::secure(Request::getRequestUri());
    }
	}

}
