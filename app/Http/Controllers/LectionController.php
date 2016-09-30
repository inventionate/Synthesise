<?php

namespace Synthesise\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Synthesise\Http\Requests\NoteRequest;
use Synthesise\Http\Requests\NoteUpdateRequest;
use Synthesise\Repositories\Facades\User;
use Synthesise\Repositories\Facades\Video;
use Synthesise\Repositories\Facades\Note;
use Synthesise\Extensions\Facades\Parser;
use Barryvdh\DomPDF\Facade as PDF;

class LectionController extends Controller
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
