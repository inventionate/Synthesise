<?php namespace Synthesise\Http\Controllers\API;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Synthesise\Http\Requests\MessageRequest;
use Synthesise\Repositories\Facades\Message;

/**
 * @Resource("api/v1/messages", except={"create", "show", "edit"})
 * @Middleware("auth.basic")
 */
class MessageController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$messages = Message::getAll();
		// JSON Response
		return $messages;
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(MessageRequest $request)
	{
		$content = $request->message;

		$type = $request->type;

		Message::store($content, $type);

		if ( $request->ajax() )
		{
			return "sucess";
		}
		else
		{
			return redirect()->back()->with('success',true);
		}

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, MessageRequest $request)
	{
		$content = $request->message;

		$type = $request->type;

		Message::update($id,$content,$type);

		// Erfolg zurückmelden
		if ( $request->ajax() )
		{
			return "success";
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id, Request $request)
	{
		Message::delete($id);

		if ( $request->ajax() )
		{
			return "success";
		}
	}

}
