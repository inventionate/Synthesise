<?php namespace Synthesise\Http\Controllers;

use Synthesise\Repositories\Facades\Faq;

class FaqController {

	/**
	 * Häufig gestellte Fragen anzeigen.
	 * GET /hgf/{letter}
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
