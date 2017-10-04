<?php

namespace Synthesise\Http\Controllers;

use Illuminate\Http\Request;

use Section;

class SectionController extends Controller
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

    /**
     * Stores a new section.
     *
     * @param   Request  $request
     *
     * @return Redirect
     */
    public function store(Request $request)
    {
        // Validation
        $this->validate($request, [
            'name'                  => 'required|string',
            'seminar_name'          => 'required|string',
            'further_reading'       => 'required|file',
        ]);

        $name = $request->name;

        $seminar_name = $request->seminar_name;

        $further_reading_path = $request->file('further_reading')->store('public/sections');

        Section::store($name, $seminar_name, $further_reading_path);

        return back()->withInput();
    }

    /**
     * Update section.
     *
     * @param   Request $request
     * @param   int     $id
     *
     * @return  Redirect
     */
    public function update(Request $request, $id)
    {
        // Validation
        $this->validate($request, [
            'name'                  => 'required|string',
            'seminar_name'          => 'required|string',
            'further_reading'       => 'file',
        ]);

        $name = $request->name;

        $seminar_name = $request->seminar_name;

        $further_reading_path = $request->file('further_reading')->store('public/sections');

        Section::update($id, $name, $seminar_name, $further_reading_path);

        return back()->withInput();
    }

    /**
     * Destroy section
     *
     * @return Redirect
     */
    public function destroy($id)
    {
        Section::delete($id);

        return back()->withInput();
    }
}
