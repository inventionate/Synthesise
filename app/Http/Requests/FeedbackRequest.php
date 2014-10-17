<?php namespace Synthesise\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class FeedbackRequest extends FormRequest {

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'nachricht' => 'required',
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

	/**
	* Get the proper failed validation response for the request.
	*
	* @param  array  $errors
	* @return Response
	*/
	public function response(array $errors)
	{
		return $this->redirector->to($this->getRedirectUrl())
																					->withInput($this->except($this->dontFlash))
																					->withErrors($errors)
																					->with('feedback_errors', true);

	}

}
