<?php namespace Synthesise\Repositories\Faq;

use Illuminate\Database\Eloquent\Model;

/**
 * Faq Repository mit Queries und Logik.
 */
class FaqRepository implements FaqInterface
{
  /**
   * Variable des zugrundeliegenden Eloquent Models.
   *
   */
  protected $faqModel;

  /**
   * Initziiert die Klasse $faqModel mit dem injizierten Model.
   *
   * @param Model $faq
   * @return FaqRepository
   */
  public function __construct(Model $faq)
  {
    $this->faqModel = $faq;
  }

  /**
   * Gibt alle FAQs alphabetisch sortiert zurück.
   *
   * @return 		array Alle FAQ-Einträgen.
   */
  public function getAll()
  {
    return $this->faqModel->all()->sortBy('area');
  }

  /**
   * Gibt die FAQs eines bestimmten Bereichs (Anfangsbuchstabe) zurück.
   *
   * @param 		string $letter Ein Buchstabe.
   * @return 		array Alle FAQ-Einträgen eines bestimmten Bereichs.
   */
  public function getByLetter($letter)
  {
    return $this->faqModel->where('area',$letter)->get();
  }

  /**
   * Gibt die jeweiligen Bereiche (Anfangsbuchstaben) zurück.
   *
   * @return 		array Alle vorhandenen Buchstabenbereiche.
   */
  public function getLetters()
  {
    $letters = preg_replace('{(.)\1+}','$1',implode('',$this->faqModel->lists('area')));
    return $letters;
  }

}
