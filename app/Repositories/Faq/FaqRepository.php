<?php

namespace Synthesise\Repositories\Faq;

use Illuminate\Database\Eloquent\Model;
use Synthesise\Faq as FAQ;

/**
 * FAQ Repository mit Queries und Logik.
 */
class FaqRepository implements FaqInterface
{

  /**
   * Gibt alle FAQs alphabetisch sortiert zurück.
   *
   * @return 		array Alle FAQ-Einträgen.
   */
  public function getAll()
  {
      return FAQ::all()->sortBy('area');
  }

  /**
   * Gibt die FAQs eines bestimmten Bereichs (Anfangsbuchstabe) zurück.
   *
   * @param 		string $letter Ein Buchstabe.
   *
   * @return 		array Alle FAQ-Einträgen eines bestimmten Bereichs.
   */
  public function getByLetter($letter)
  {
      return FAQ::where('area', $letter)->get();
  }

  /**
   * Gibt die jeweiligen Bereiche (Anfangsbuchstaben) zurück.
   *
   * @return 		string Alle vorhandenen Buchstabenbereiche.
   */
  public function getLetters()
  {
      # String aller Buchstaben
      $letters = preg_replace('/(.)(?=.*?\1)/', '', implode('', FAQ::lists('area')->sort()->toArray()));

      return $letters;
  }

  /**
   * Gibt die jeweiligen Bereiche zurück.
   *
   * @return 		array Alle vorhandenen Themen.
   */
  public function getSubjects()
  {
      # String aller Buchstaben
      $subjects = FAQ::lists('subject')->toArray();

      return $subjects;
  }

  /**
   * Store FAQ.
   *
   * @param 		string subject
   * @param 		string question
   * @param 		string answer
   */
  public function store($subject, $question, $answer)
  {

    // Neue Nachrichteninstanz generieren
    $faq = new FAQ;

    $area = strtoupper(substr($subject, 0,1));

    $faq->area = $area;
    $faq->subject = $subject;
    $faq->question = $question;
    $faq->answer = $answer;

    $faq->save();

  }

  /**
   * Update FAQ.
   *
   * @param         int $id
   * @param 		string subject
   * @param 		string question
   * @param 		string answer
   */
  public function update($id, $subject, $question, $answer)
  {

      $faq = FAQ::find($id);

      $faq->subject = $subject;
      $faq->question = $question;
      $faq->answer = $answer;

      $faq->save();

  }

  /**
   * Delete FAQ.
   *
   * @param         int $id
   *
   * @return 		array Alle vorhandenen Buchstabenbereiche.
   */
  public function destroy($id)
  {
      // Find and delete FAQ.
      FAQ::find($id)->delete();
  }

}
