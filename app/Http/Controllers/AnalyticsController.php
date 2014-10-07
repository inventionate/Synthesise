<?php namespace Synthesise\Http\Controllers;

use Illuminate\Support\Facades\View;
use Synthesise\Extensions\Analytics;

class AnalyticsController {

	/**
	 * Display a listing of the resource.
	 * GET /analytics
	 *
	 * @return View
	 */
	public function index()
	{
		return View::make('analytics.index');
	}

}
