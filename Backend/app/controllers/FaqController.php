<?php

class FaqController extends \BaseController {

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

		return View::make('faq')
								->with('answersByLetter',$answersByLetter)
								->with('letter',$letter)
								->with('letters',$letters)
								->with('answers',$answers);
	}

}
