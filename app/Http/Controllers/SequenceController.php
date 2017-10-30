<?php

namespace Synthesise\Http\Controllers;

use Illuminate\Http\Request;

use Sequence;
use Lection;

class SequenceController extends Controller
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
    * Update help points
    *
    * @param  Request   $request
    * @param  string    $name
    * @param  string    $lection_name
    * @param  int       $sequence
    *
    * @return JSON      All available help points.
    */
    public function updateHelpPoints(Request $request, $name, $lection_name, $sequence)
    {

        // Validation
        $this->validate($request, [
            'help_point' => 'required|numeric'
        ]);

        $help_point = $request->help_point;

        $current_sequence = Lection::getSequence($lection_name, $sequence);

        $id = $current_sequence->id;

        Sequence::updateHelpPoints($id, $help_point);

    }

    /**
    * Destroy help points
    *
    * @param  string    $lection_name
    * @param  int       $sequence
    */
    public function deleteHelpPoints($lection_name, $sequence)
    {
        $current_sequence = Lection::getSequence($lection_name, $sequence);

        $id = $current_sequence->id;

        Sequence::deleteHelpPoints($id);
    }

    // @TODO Speichern von neuen Sequencen inkl. Codierung umsetzen.

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
