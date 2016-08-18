<?php namespace Synthesise\Http\Controllers;

class DemoController extends Controller {

	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

	/**
	 * Promoseite anzeigen.
	 *
	 * @return    View
	 */
	public function index()
	{
		return view('demo');
	}

}
