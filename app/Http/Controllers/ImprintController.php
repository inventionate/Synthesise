<?php namespace Synthesise\Http\Controllers;

use Illuminate\Routing\Controller;

/**
 * @Middleware("auth")
 */
class ImprintController extends Controller {

	/**
	 * Impressum anzeigen.
	 *
	 * @Get("impressum", as="imprint")
	 *
	 * @return    View
	 */
	public function index()
	{
		return view('imprint');
	}

}
