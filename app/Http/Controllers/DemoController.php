<?php namespace Synthesise\Http\Controllers;

class DemoController extends Controller {

	/**
	 * Promoseite anzeigen.
	 *
	 * @return    View
	 */
	public function index()
	{
		return view('demo');
	}

}
