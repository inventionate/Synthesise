<?php namespace Synthesise\Http\Controllers;

class ImprintController {

	/**
	 * Impressum anzeigen.
	 * GET /impressum
	 *
	 * @return    View
	 */
	public function index()
	{
		return view('imprint');
	}

}
