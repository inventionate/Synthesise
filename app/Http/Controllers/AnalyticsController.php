<?php namespace Synthesise\Http\Controllers;

use Synthesise\Extensions\Facades\Analytics;

/**
 * @Middleware("auth")
 */
class AnalyticsController extends Controller {

	/**
	* Zeigt die Analytics an.
	*
	* @Get("analytics")
	*
	* @return View
	*/
	public function index()
	{

		$visitors = Analytics::getVisitors();

		$semesterVisits = Analytics::getSemesterVisits();

		$downloadedPapers = Analytics::downloadedPapers();

		$playedVideos = Analytics::playedVideos();

		return view('analytics.index')
									->with('admins',$visitors['admins'])
									->with('mentors',$visitors['mentors'])
									->with('students', $visitors['students'])
									->with('visits', json_encode($semesterVisits['visits']))
									->with('uniqVisitors', json_encode($semesterVisits['uniqVisitors']))
									->with('downloadedPapers', $downloadedPapers)
									->with('playedVideos', $playedVideos);
	}

}
