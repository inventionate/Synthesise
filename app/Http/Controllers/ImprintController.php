<?php namespace Synthesise\Http\Controllers;

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
