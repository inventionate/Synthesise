<?php namespace Synthesise\Http\Controllers;

use Illuminate\Support\Facades\View;
use Synthesise\Extensions\Facades\Analytics;

class AnalyticsController {

	/**
	 * Display a listing of the resource.
	 * GET /analytics
	 *
	 * @return View
	 */
	public function index()
	{

		$liveVisitors = Analytics::getLiveVisitors();

		return View::make('analytics.index')
									->with('liveVisitors',$liveVisitors)
		;
	}

}
