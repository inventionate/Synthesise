<?php

namespace Synthesise\Http\Controllers;

use Synthesise\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Synthesise\Repositories\Facades\Message;

class MessageController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {

        // Validation
        $this->validate($request, [
            'seminar_name' => 'required|string',
            'title' => 'required|string',
            'content' => 'required|string',
            'colour' => 'required|alpha'
        ]);

        $seminar_name = $request->seminar_name;

        $title = $request->title;

        $content = $request->content;

        $colour = $request->colour;

        Message::store($seminar_name, $title, $content, $colour);

        return back()->withInput();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update($id, Request $request)
    {

        // Validation
        $this->validate($request, [
            'title' => 'required|string',
            'content' => 'required|string',
            'colour' => 'required|alpha'
        ]);

        $title = $request->title;

        $content = $request->content;

        $colour = $request->colour;

        Message::update($id, $title, $content, $colour);

        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        Message::delete($id);

        return back()->withInput();
    }
}
