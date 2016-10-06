<?php

namespace Synthesise\Http\Controllers;

class AudiocollageController extends Controller
{

    /**
     * Promoseite anzeigen.
     *
     * @return View
     */
    public function index()
    {
        return view('audiocollage');
    }
}
