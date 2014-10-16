<?php namespace Synthesise\Http\Controllers;

use Illuminate\Routing\Controller;
use Synthesise\Http\Requests\SendRequest;
use Illuminate\Support\Facades\Mail;
use Synthesise\Repositories\Facades\User;

/**
 * @Middleware("auth")
 */
class ContactController extends Controller {

	/**
	 * Kontaktformulare anzeigen.
	 *
	 * @Get("kontakt", as="kontakt")
	 *
	 * @return View
	 */
	public function index()
	{
		return view('contact');
	}

	/**
	 * Eine Kontaktnachricht senden.
	 *
	 * @Post("kontakt/{send}")
	 *
	 * @param     string $type
	 * @return    Redirect
	 */
	public function send($type, SendRequest $request)
	{
		$email = User::getEmail();

		$name = User::getUsername();

		$data = array(
					'content' => $request->get('nachricht'),
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
		return redirect('kontakt')->with($type . '_success',true);
		
	}

}
