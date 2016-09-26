<?php

namespace Synthesise\Http\Controllers;

use Illuminate\Http\Request;

use Synthesise\Http\Requests;

use Seminar;
use Lection;
use Auth;
use User;

class SeminarController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
	 * List Seminar.
	 *
	 * @return View
	 */
	public function index()
	{

		// Aktuelles Video abfragen
		if(Seminar::getCurrentVideo() != false) {
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

		// Get all Videos
		$videos = Seminar::getVideos();

		// Get all messages
		$messages = Seminar::getAll()->sortBy('id');

		// User role
		$role = Auth::user()->role;

		// Username
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

    /**
     * Store a newly created Seminar.
     *
     * @param  Request  $request
     *
     * @return Redirect
     */
    public function store(Request $request)
    {

        return back()->withInput();

    }

    /**
     * List seminar settings.
     *
     * @param int $id
     *
     * @return View
     */
    public function settings($id)
    {
        $seminar = Seminar::get($id);

        dd($seminar);

        return view('seminar.settings');
    }
}
