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
    public function deleteHelpPoints($name, $lection_name, $sequence)
    {
        $current_sequence = Lection::getSequence($lection_name, $sequence);

        $id = $current_sequence->id;

        Sequence::deleteHelpPoints($id);

        return back();
    }

    /**
     * Store a newly created Sequence.
     *
     * @param Request   $request
     *
     * @return Redirect
     */
    public function store(Request $request)
    {

        // Validation
        $this->validate($request, [
            'lection_name' => 'required|string',
            'sequence_name' => 'required|string',
            'video' => 'required|mimetypes:video/avi,video/mpeg,video/quicktime,video/webm',
        ]);

        $lection_name = $request->lection_name;
        $sequence_name = $request->sequence_name;
        // Store Video

        // Hier müsste das Video an eine Funktion übergeben werden, die es in das richtige Format konvertiert und an dem entsprechenden Ort speichert.

        $video_path = $request->file('video')->store('public/videos');

        //Sequence::store($lection_name, $sequence_name, $video_path);

        return back()->withInput();
    }

    public function update()
    {
        # code...
    }

    public function destroy()
    {
        # code...
    }

}
