<?php namespace Synthesise\Http\Controllers;

use Illuminate\Routing\Controller;
use Synthesise\Http\Requests\FeedbackRequest;
use Synthesise\Http\Requests\SupportRequest;
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
	 * @Post("kontakt/feedback")
	 *
	 * @return    Redirect
	 */
	public function sendFeedback(FeedbackRequest $request)
	{
		$email = User::getEmail();

		$name = User::getUsername();

		$data = [
			'content' => $request->nachricht,
			'name' => $name
		];
		Mail::send('emails.feedback', $data, function($message) use ($email,$name)
		{
			$message->from($email, $name);
			$message->to('hoyer@ph-karlsruhe.de', 'Timo Hoyer')->subject('Eine neue Anfrage über die e:t:p:M Web-App');
		});
		return redirect('kontakt')->with('feedback_success',true);
	}

	/**
	* Eine Supportnachricht senden.
	*
	* @Post("kontakt/support")
	*
	* @return    Redirect
	*/
	public function sendSupport(SupportRequest $request)
	{
		$email = User::getEmail();

		$name = User::getUsername();

		$data = [
			'content' => $request->nachricht,
			'name' => $name
		];
		Mail::send('emails.support', $data, function($message) use ($email,$name)
		{
			$message->from($email, $name);
			$message->to('mundt@ph-karlsruhe.de', 'Fabian Mundt')->subject('Eine neue Supportanfrage über die e:t:p:M Web-App');
		});
		return redirect('kontakt')->with('support_success',true);
	}

}
