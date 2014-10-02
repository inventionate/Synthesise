<?php

class ImprintController extends \BaseController {

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
