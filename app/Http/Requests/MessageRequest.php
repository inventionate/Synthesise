<?php namespace Synthesise\Http\Requests;

use Illuminate\Support\Facades\Auth;

class MessageRequest extends Request {

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'message'	=> 'required',
			'type'		=> 'required|alpha'
		];
	}

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return Auth::user()->role === 'Admin';
	}

}
