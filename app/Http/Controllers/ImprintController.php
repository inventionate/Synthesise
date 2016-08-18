<?php namespace Synthesise\Http\Controllers;

class ImprintController extends Controller {

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
	 * Impressum anzeigen.
	 *
	 * @return    View
	 */
	public function index()
	{
		return view('imprint');
	}

}
