<?php

class DashboardController extends \BaseController {

	/**
	 * Dashboard anzeigen.
	 * GET /dashboard
	 *
	 * @return    View
	 */
	public function index()
	{
		if(Video::getCurrentVideo() != false) {
			$videoname = Video::getCurrentVideo()->videoname;
			$author = 'von ' . Video::getCurrentVideo()->author;
			$available = true;
			$papers = Video::getPapers($videoname);
		}
		else {
			$videoname = 'Kein Video verfügbar.';
			$author = '';
			$available = false;
			$papers = null;
		}

		// Alle Videos ausgeben
		$videos = Video::getVideos();

		// Rolle des Benutzers abfragen
		$role = Auth::user()->role;

		// Benutzername

		$username = User::getUsername();

		return View::make('dashboard.home')
									->with('available',$available)
									->with('papers',$papers)
									->with('role',$role)
									->with('videos',$videos)
									->with('username',$username)
									->with('author',$author)
									->with('videoname',$videoname);
	}

}