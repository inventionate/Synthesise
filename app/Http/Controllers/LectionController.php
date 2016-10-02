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

    /**
     * Store new lection.
     *
     * @param Request   $request
     *
     * @return Redirect
     */
    public function store(Request $request)
    {
        // Validation
        $this->validate($request, [
            'name'              => 'required|string',
            'section_id'        => 'required|integer',
            'author'            => 'required|string',
            'contact'           => 'required|email',
            'text'              => 'required|file',
            'text_name'         => 'required|string',
            'text_author'       => 'required|string',
            'image'             => 'required|image',
            'available_from'    => 'required|date',
            'available_to'      => 'required|date',
            'authorized_users'  => 'array',
            'seminar_name'      => 'required|string',
        ]);

        $name              = $request->name;
        $section_id        = $request->section_id;
        $author            = $request->author;
        $contact           = $request->contact;
        $text              = $request->file('text');
        $text_name         = $request->text_name;
        $text_author       = $request->text_author;
        $image             = $request->file('image');
        $available_from    = $request->available_from;
        $available_to      = $request->available_to;
        $authorized_users  = $request->authorized_users;
        $seminar_name      = $request->seminar_name;

        Lection::store($name, $section_id, $author, $contact, $text, $text_name, $text_author, $image, $available_from, $available_to, $authorized_users, $seminar_name);

        return back()->withInput();
    }

    /**
     * Attach lection to section.
     *
     * @param Request   $request
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

    /**
     * Update an existing lection.
     *
     * @param Request   $request
     * @param string    $name
     *
     * @return Redirect
     */
    public function update(Request $request, $name)
    {
        // Validati on
        $this->validate($request, [
            'section_id'        => 'required|integer',
            'old_section_id'    => 'required|integer',
            'author'            => 'required|string',
            'contact'           => 'required|email',
            'text'              => 'file',
            'text_name'         => 'required|string',
            'text_author'       => 'required|string',
            'image'             => 'image',
            'available_from'    => 'required|date',
            'available_to'      => 'required|date',
            'authorized_users'  => 'array',
            'seminar_name'      => 'required|string',
        ]);

        $section_id        = $request->section_id;
        $old_section_id    = $request->old_section_id;
        $author            = $request->author;
        $contact           = $request->contact;
        $text              = $request->file('text');
        $text_name         = $request->text_name;
        $text_author       = $request->text_author;
        $image             = $request->file('image');
        $available_from    = $request->available_from;
        $available_to      = $request->available_to;
        $authorized_users  = $request->authorized_users;
        $seminar_name      = $request->seminar_name;

        Lection::update($name, $section_id, $old_section_id, $author, $contact, $text, $text_name, $text_author, $image, $available_from, $available_to, $authorized_users, $seminar_name);

        return back()->withInput();
    }

    public function delete()
    {
        # code...
    }
}
