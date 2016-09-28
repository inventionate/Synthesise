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
   * Collection of dictinct areas
   *
   * @return    collection
   */
  public function getLetters()
  {

      return FAQ::select('area')->distinct()->get()->sort();
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
   * @param 		string $seminar_name
   * @param 		string subject
   * @param 		string question
   * @param 		string answer
   */
  public function store($seminar_name, $subject, $question, $answer)
  {

    // Neue FAQ.
    $faq = new FAQ;

    // Generate area.
    $area = strtoupper(substr($subject, 0,1));

    // Add attributes.
    $faq->seminar_name = $seminar_name;
    $faq->area = $area;
    $faq->subject = $subject;
    $faq->question = $question;
    $faq->answer = $answer;

    // Save FAQ.
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

      $area = strtoupper(substr($subject, 0,1));

      $faq->area = $area;
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
  public function delete($id)
  {
      // Find and delete FAQ.
      FAQ::find($id)->delete();
  }

}
