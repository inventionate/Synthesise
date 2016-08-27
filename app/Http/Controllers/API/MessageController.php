<?php

namespace Synthesise\Http\Controllers\API;

use Synthesise\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Synthesise\Http\Requests\MessageRequest;
use Synthesise\Repositories\Facades\Message;

class MessageController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(MessageRequest $request)
    {
        $title = $request->title;

        $content = $request->content;

        $colour = $request->colour;

        Message::store($title, $content, $colour);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update($id, MessageRequest $request)
    {
        $title = $request->title;

        $content = $request->content;

        $colour = $request->colour;

        Message::update($id, $title, $content, $colour);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id, Request $request)
    {
        Message::delete($id);
    }
}
