<?php

namespace Synthesise\Http\Controllers;

use Illuminate\Http\Request;

use Lection;
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

    /**
     * Attach lection to section.
     *
     * @return Redirect
     */
    public function attach(Request $request)
    {
        // Validation
        $this->validate($request, [
            'section_id' => 'required|integer',
            'name' => 'required|string',
        ]);

        $section_id = $request->section_id;

        $name = $request->name;

        Lection::attachToSection($section_id, $name);

        return back()->withInput();

    }

    /**
     * Detach lection from section.
     *
     * @param   string  $name
     * @param   int     $section_id
     *
     * @return Redirect
     */
    public function detach($name, $section_id)
    {

        Lection::detachFromSection($section_id, $name);

        return back()->withInput();

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
