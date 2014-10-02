<?php namespace Synthesise\Repositories\Faq;

/**
 * Ein Interface für Faq.
 */
interface FaqInterface
{
  public function getAll();

  public function getByLetter($letter);

  public function getLetters();
}
