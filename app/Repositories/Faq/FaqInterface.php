<?php namespace Synthesise\Repositories\Faq;

/**
 * Ein Interface für Faq.
 */
interface FaqInterface
{
  public function getAll($seminar_name);

  public function getByLetter($seminar_name, $letter);

  public function getLetters($seminar_name);

  public function getSubjects($seminar_name);

  public function store($seminar_name, $subject, $question, $answer);

  public function update($id, $subject, $question, $answer);

  public function delete($id);
}
