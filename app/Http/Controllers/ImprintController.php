<?php namespace Synthesise\Http\Controllers;

use Illuminate\Support\Facades\View;

class ImprintController {

	/**
	 * Impressum anzeigen.
	 * GET /impressum
	 *
	 * @return    View
	 */
	public function index()
	{
		return View::make('imprint');
	}

}
