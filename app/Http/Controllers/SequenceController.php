<?php

namespace Synthesise\Http\Controllers;

use Illuminate\Http\Request;

use Synthesise\Http\Requests;

class SequenceController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'admin.teacher']);
    }

    public function store()
    {
        # code...
    }

    public function update()
    {
        # code...
    }

    public function delete()
    {
        # code...
    }

}
