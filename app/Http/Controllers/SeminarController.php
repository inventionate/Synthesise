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
	public function index($name)
	{

		// User role
		$role = Auth::user()->role;

		// Username
		$username = User::getUsername();

        // Get all messages
        $messages = Seminar::getAllMessages($name);


		// Aktuelles Video abfragen
		// if(Seminar::getCurrentVideo() != false) {
		// 	$videoname = Video::getCurrentVideo()->videoname;
		// 	$author = Video::getCurrentVideo()->author;
		// 	$available = true;
		// 	$papers = Video::getPapers($videoname);
		// }
		// else {
		// 	$videoname = 'Kein Video verfügbar.';
		// 	$author = '';
		// 	$available = false;
		// 	$papers = null;
		// }

		// Get all Videos
		// $videos = Seminar::getVideos();
        //

		return view('seminar.index')
                                    ->with('seminar_name', $name)
                                    ->with('role', $role)
                                    ->with('username', $username)
                                    ->with('messages',$messages);
                                    // ->with('available',$available)
									// ->with('papers',$papers)
									// ->with('videos',$videos)
									// ->with('author',$author)
									// ->with('videoname',$videoname)
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

        // Validation
        $this->validate($request, [
            'title' => 'required|string',
            'author' => 'required|string',
            'subject' => 'required|string',
            'module' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|image',
            'available_from' => 'required|date',
            'available_to' => 'required|date',
            'authorized_users' => 'array'
        ]);

        $title = $request->title;
        $author = $request->author;
        $subject = $request->subject;
        $module = $request->module;
        $description = $request->description;
        $image = $request->file('image');
        $available_from = $request->available_from;
        $available_to = $request->available_to;
        $authorized_users = $request->authorized_users;

        Seminar::store($title, $author, $subject, $module, $description, $image, $available_from, $available_to, $authorized_users);

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
