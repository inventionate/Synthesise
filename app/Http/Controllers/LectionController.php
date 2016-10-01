<?php

namespace Synthesise\Http\Controllers;

use Illuminate\Http\Request;

use User;
use Auth;

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
        # Benutzer abfragen
        # Alle Amdinistratoren hinzufügen
        # Eigener Nutzername hinzufügen
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
