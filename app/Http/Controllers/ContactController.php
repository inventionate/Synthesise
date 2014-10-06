<?php namespace Synthesise\Http\Controllers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

use Synthesise\Repositories\Facades\User;

class ContactController {

	/**
	 * Kontaktformulare anzeigen.
	 * GET /kontakt
	 *
	 * @return    View
	 */
	public function index()
	{
		return View::make('contact');
	}

	/**
	 * Eine Kontaktnachricht senden.
	 * POST /kontakt/{send}
	 *
	 * @param     string $type
	 * @return    Redirect
	 */
	public function send($type)
	{
		$email = User::getEmail();

		$name = User::getUsername();

		$rules = array(
		    'nachricht' => 'required'
		);

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails())
		{
			return Redirect::route('kontakt')->with($type . '_errors', true);
		}
		else
		{
			$data = array(
						'content' => Input::get('nachricht'),
						'name' => $name
					);
			Mail::send('emails.' . $type, $data, function($message) use ($email,$name,$type)
			{
				$message->from($email, $name);
				if ($type === 'feedback')
				{
					$message->to('hoyer@ph-karlsruhe.de', 'Timo Hoyer')->subject('Eine neue Anfrage über die e:t:p:M Web-App');
				}
				elseif ($type === 'support')
				{
					$message->to('mundt@ph-karlsruhe.de', 'Fabian Mundt')->subject('Eine neue Supportanfrage über die e:t:p:M Web-App');
				}
			});

			return Redirect::to('kontakt')->with($type . '_success',true);
		}
	}

}
