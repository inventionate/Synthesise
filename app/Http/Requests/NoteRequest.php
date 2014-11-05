<?php namespace Synthesise\Http\Requests;

use Illuminate\Support\Facades\Auth;

class NoteRequest extends Request {

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			// @todo Eine Validation Regel für alpha_dash mit Leerzeichen erstellen.
			'cuepointNumber'	=> 'required'
		];
	}

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return Auth::check();
	}

}
