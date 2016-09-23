<?php

namespace Synthesise\Http\Controllers;

use Auth;
use Seminar;
use User;

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

		$seminars = Seminar::getAllWithUserCount();

		$admins = User::getAllByRole('Admin');

		return view('dashboard.index')
									->with('seminars',$seminars)
									->with('admins',$admins);
	}

}
