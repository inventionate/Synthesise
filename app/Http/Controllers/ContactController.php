<?php namespace Synthesise\Http\Controllers;

use Synthesise\Http\Requests\FeedbackRequest;
use Synthesise\Http\Requests\SupportRequest;
use Synthesise\Repositories\Facades\User;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller {

	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

	/**
	 * Kontaktformulare anzeigen.
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
