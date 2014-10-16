<?php namespace Synthesise\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

use Synthesise\Repositories\Facades\User;
use Synthesise\Repositories\Facades\Video;
use Synthesise\Repositories\Facades\Message;

/**
 * @Middleware("auth")
 */
class DashboardController extends Controller {

	/**
	 * Dashboard anzeigen.
	 *
	 * @Get("/", as="dashboard")
	 *
	 * @return View
	 */
	public function index()
	{
		// Nachrichten abfragen
		$messages = Message::getAll();

		// Aktuelles Video abfragen
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

		return view('dashboard.index')
									->with('available',$available)
									->with('papers',$papers)
									->with('role',$role)
									->with('videos',$videos)
									->with('username',$username)
									->with('author',$author)
									->with('videoname',$videoname)
									->with('messages',$messages);
	}

}
