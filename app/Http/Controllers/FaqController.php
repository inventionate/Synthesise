<?php namespace Synthesise\Http\Controllers;

use Synthesise\Repositories\Facades\Faq;

/**
 * @Middleware("auth")
 */
class FaqController extends Controller {

	/**
	 * Häufig gestellte Fragen anzeigen.
	 *
	 * @Get("hgf/{letter?}", as="faq")
	 *
	 * @param 		string $letter
	 * @return 		View
	 */
	public function index($letter = null)
	{
		$answers = FAQ::getAll();
		$letters = FAQ::getLetters();

		$answersByLetter = FAQ::getByLetter($letter);

		return view('faq')
								->with('answersByLetter',$answersByLetter)
								->with('letter',$letter)
								->with('letters',$letters)
								->with('answers',$answers);
	}

}
