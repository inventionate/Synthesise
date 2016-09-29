<?php namespace Synthesise\Http\Controllers;

use Illuminate\Http\Request;

use User;
use Mail;

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
	 * Eine Kontaktnachricht senden.
	 *
	 * @return    Redirect
	 */
	public function sendFeedback(Request $request)
	{
		$email = User::getEmail();

		$name = User::getUsername();

		$feedback_mail = $request->feedback_mail;

		$seminar_name = $request->seminar_name;

		$data = [
			'content' => $request->nachricht,
			'name' => $name
		];
		Mail::send('emails.feedback', $data, function($message) use ($email, $name, $feedback_mail, $seminar_name)
		{
			$message->from($email, $name);
			$message->to($feedback_mail)->subject('Eine neue e:t:p:M Synthesise Anfrage');
		});
		return back()->with('feedback_success',true);
	}

	/**
	* Eine Supportnachricht senden.
	*
	* @return    Redirect
	*/
	public function sendSupport(Request $request)
	{
		$email = User::getEmail();

		$name = User::getUsername();

		$support_mail = $request->support_mail;

		$data = [
			'content' => $request->nachricht,
			'name' => $name
		];
		Mail::send('emails.support', $data, function($message) use ($email, $name, $support_mail)
		{
			$message->from($email, $name);
			$message->to($support_mail)->subject('Eine neue e:t:p:M Synthesise Supportanfrage');
		});
		return back()->with('support_success',true);
	}

}
