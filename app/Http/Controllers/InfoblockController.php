<?php

namespace Synthesise\Http\Controllers;

use Illuminate\Http\Request;

use Infoblock;
use Redirect;
use URL;

class InfoblockController extends Controller
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
     * Store a newly created Infoblock.
     *
     * @param  Request  $request
     *
     * @return Redirect
     */
    public function store(Request $request)
    {

        // Validation
        $this->validate($request, [
            'name' => 'required|string',
            'content' => 'required|string',
            'link_url' => 'url',
            'image' => 'image',
            'text' => 'file',
            'seminar_name' => 'required|string',
        ]);

        $name = $request->name;
        $content = $request->content;
        $link_url = $request->link_url;
        $image_path = $request->file('image')->store('public/seminars/infoblocks');
        $text_path = $request->file('text')->store('public/seminars/infoblocks');
        $seminar_name = $request->seminar_name;

        Infoblock::store($name, $content, $link_url, $image_path, $text_path, $seminar_name);

        return back()->withInput();

    }

    /**
     * Update an Infoblock.
     *
     * @param  Request  $request
     * @param  int      $id
     *
     * @return Redirect
     */
    public function update(Request $request, $id)
    {

        // Validation
        $this->validate($request, [
            'name' => 'required|string',
            'content' => 'required|string',
            'link_url' => 'url',
            'image' => 'image',
            'text' => 'file',
            'seminar_name' => 'required|string',
        ]);

        $name = $request->name;
        $content = $request->content;
        $link_url = $request->link_url;
        $image_path = $request->file('image')->store('public/seminars/infoblocks');
        $text_path = $request->file('text')->store('public/seminars/infoblocks');
        $seminar_name = $request->seminar_name;

        Infoblock::update($id, $name, $content, $link_url, $image_path, $text_path, $seminar_name);

        return Redirect::to(URL::previous() . "#infoblocks");

    }

    /**
     * Destroy an Infoblock.
     *
     * @param  int  $id
     *
     * @return Redirect
     */
    public function destroy($id)
    {

        Infoblock::delete($id);

        return Redirect::to(URL::previous() . "#infoblocks");

    }
}
