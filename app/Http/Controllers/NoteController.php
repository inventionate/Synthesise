<?php

namespace Synthesise\Http\Controllers;

use Illuminate\Http\Request;

use Note;
use Auth;

class NoteController extends Controller
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
     * Get a new controller instance.
     *
     * @return void
     */
    public function get(Request $request, $name, $lection_name, $sequence)
    {

        // Validation
        $this->validate($request, [
            'cuepoint_id' => 'required|integer'
        ]);

        $user_id = Auth::user()->id;

        $cuepoint_id = $request->cuepoint_id;

        $note = Note::get($user_id, $cuepoint_id, $lection_name, $name);

        if ( $request->ajax() )
        {
            return $note;
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function store(Request $request, $name, $lection_name, $sequence)
    {

        // Validation
        $this->validate($request, [
            'note' => 'required|string',
            'cuepoint_id' => 'required|integer'
        ]);

        $user_id = Auth::user()->id;
        $cuepoint_id = $request->cuepoint_id;
        $note = $request->note;

        Note::store($user_id, $cuepoint_id, $lection_name, $name, $note);

    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function update(Request $request, $name, $lection_name, $sequence)
    {

        // Validation
        $this->validate($request, [
            'note' => 'required|string',
            'cuepoint_id' => 'required|integer'
        ]);

        $user_id = Auth::user()->id;
        $cuepoint_id = $request->cuepoint_id;
        $note = $request->note;

        Note::update($user_id, $cuepoint_id, $lection_name, $name, $note);

    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function destroy(Request $request, $name, $lection_name, $sequence)
    {
        // Validation
        $this->validate($request, [
            'cuepoint_id' => 'required|integer'
        ]);

        $user_id = Auth::user()->id;

        $cuepoint_id = $request->cuepoint_id;

        $note = Note::delete($user_id, $cuepoint_id, $lection_name, $name);
    }
}
