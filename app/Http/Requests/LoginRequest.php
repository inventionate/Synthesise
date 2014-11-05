<?php namespace Synthesise\Http\Requests;

class LoginRequest extends Request {

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'username' 		=> 'required|alpha_num',
			'password' 		=> 'required',
			'rememberme' 	=> 'boolean'
		];
	}

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

}
