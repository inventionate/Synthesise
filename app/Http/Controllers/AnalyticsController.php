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

		$visitors = Analytics::getVisitors();

		$semesterVisits = Analytics::getSemesterVisits();

		return view('analytics.index')
									->with('admins',$visitors['admins'])
									->with('mentors',$visitors['mentors'])
									->with('students', $visitors['students'])
									->with('visits', json_encode($semesterVisits['visits']))
									->with('uniqVisitors', json_encode($semesterVisits['uniqVisitors']));
	}

}
