<?php

namespace Synthesise\Http\Requests;

use Synthesise\Http\Requests\Request;

class FaqRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->role === 'Admin';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
			'title'		=> 'required',
			'content'	=> 'required',
		];
    }
}
