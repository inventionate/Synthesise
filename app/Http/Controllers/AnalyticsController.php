<?php namespace Synthesise\Http\Controllers;

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

		$liveVisitors = Analytics::getVisitors();

		return view('analytics.index')
									->with('liveVisitors',$liveVisitors)
		;
	}

}
