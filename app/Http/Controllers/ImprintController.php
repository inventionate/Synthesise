<?php namespace Synthesise\Http\Controllers;

class ImprintController extends Controller {

	/**
	 * Impressum anzeigen.
	 *
	 * @return    View
	 */
	public function index()
	{
		return view('imprint');
	}

}
