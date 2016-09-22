<?php

namespace Synthesise\Http\Controllers;

use Illuminate\Http\Request;

use Synthesise\Http\Requests;

use Seminar;

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
     * List all seminars.
     *
     * @return View
     */
    public function index()
    {
        //@TODO convert Dashboard!
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
