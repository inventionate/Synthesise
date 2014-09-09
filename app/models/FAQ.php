<?php

class FAQ extends \Eloquent {

	/**
	 * Die Datenbanktabelle des Models.
	 *
	 * @var 		string
	 */
	protected $table = 'faqs';

	/**
	 * Die veränderbaren Tabellenspalten.
	 *
	 * @var 		array
	 */
	protected $fillable = ['area','subject','question','answer'];

	/**
	 * Gibt alle FAQs alphabetisch sortiert zurück.
	 *
	 * @return 		array Alle FAQ-Einträgen.
	 */
	public static function getAll()
	{
		return FAQ::all()->sortBy('area');
	}

	/**
	 * Gibt die FAQs eines bestimmten Bereichs (Anfangsbuchstabe) zurück.
	 *
	 * @param 		string $letter Ein Buchstabe.
	 * @return 		array Alle FAQ-Einträgen eines bestimmten Bereichs.
	 */
	public static function getByLetter($letter) 
	{
		return FAQ::where('area',$letter)->get();
	}

	/**
	 * Gibt die jeweiligen Bereiche (Anfangsbuchstaben) zurück.
	 *
	 * @return 		array Alle vorhandenen Buchstabenbereiche.
	 */
	public static function getLetters()
	{
		$letters = preg_replace('{(.)\1+}','$1',implode('',FAQ::lists('area')));
		return $letters;
	}

}
