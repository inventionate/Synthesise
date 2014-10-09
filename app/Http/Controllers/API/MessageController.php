<?php namespace Synthesise\Http\Controllers\API;

use Synthesise\Repositories\Facades\Message;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;

class MessageController {

	/**
	 * Display a listing of the resource.
	 * GET /api/message
	 *
	 * @return Response
	 */
	public function index()
	{
		$messages = Message::getAll();
		// JSON Response
		return $messages;
	}

	// /**
	//  * Show the form for creating a new resource.
	//  * GET /api/message/create
	//  *
	//  * @return Response
	//  */
	// public function create()
	// {
	// 	//
	// }
	//
	/**
	 * Store a newly created resource in storage.
	 * POST /api/message
	 *
	 * @return Response
	 */
	public function store()
	{
		$content = Input::get('message');

		$type = Input::get('type');

		Message::store($content, $type);

		if ( Request::ajax() )
		{
			return "sucess";
		}
		else
		{
			return Redirect::back()->with('success',true);
		}

	}
	//
	// /**
	//  * Display the specified resource.
	//  * GET /api/message/{id}
	//  *
	//  * @param  int  $id
	//  * @return Response
	//  */
	// public function show($id)
	// {
	// 	//
	// }
	//
	// /**
	//  * Show the form for editing the specified resource.
	//  * GET /api/message/{id}/edit
	//  *
	//  * @param  int  $id
	//  * @return Response
	//  */
	// public function edit($id)
	// {
	// 	//
	// }
	//
	/**
	 * Update the specified resource in storage.
	 * PUT /api/message/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$content = Input::get('message');

		$type = Input::get('type');

		Message::update($id,$content,$type);

		// Erfolg zurückmelden
		if ( Request::ajax() )
		{
			return "success";
		}
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /api/message/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Message::delete($id);

		if ( Request::ajax() )
		{
			return "success";
		}
	}

}
