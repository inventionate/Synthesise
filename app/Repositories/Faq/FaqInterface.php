<?php namespace Synthesise\Repositories\Faq;

/**
 * Ein Interface für Faq.
 */
interface FaqInterface
{
  public function getAll();

  public function getByLetter($letter);

  public function getLetters();

  public function getSubjects();

  public function store($seminar_name, $subject, $question, $answer);

  public function update($id, $subject, $question, $answer);

  public function delete($id);
}
