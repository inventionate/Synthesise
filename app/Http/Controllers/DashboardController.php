<?php namespace Synthesise\Http\Controllers;

use Illuminate\Contracts\Auth\Guard;
use Synthesise\Repositories\Facades\User;
use Synthesise\Repositories\Facades\Video;
use Synthesise\Repositories\Facades\Message;

class DashboardController extends Controller {

	/**
	* The Guard implementation.
	*
	* @var Guard
	*/
	protected $auth;

	/**
	* Create a new dashboard controller instance.
	*
	* @param  Guard  $auth
	* @return void
	*/
	public function __construct(Guard $auth)
	{
		$this->auth = $auth;
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
		$role = $this->auth->user()->role;

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
