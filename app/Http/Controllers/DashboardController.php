<?php namespace Synthesise\Http\Controllers;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;
use Synthesise\Repositories\Facades\User;
use Synthesise\Repositories\Facades\Video;
use Synthesise\Repositories\Facades\Message;

class DashboardController extends Controller {

	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

	/**
	 * Dashboard anzeigen.
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
			$author = Video::getCurrentVideo()->author;
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
