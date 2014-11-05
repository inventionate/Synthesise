<?php namespace Synthesise\Extensions\Contracts;

interface Parser {

  /**
   * Normalisiert die übergebenen URL.
   *
   * @param     string $url
   */
  public function normalizeURL($url);

  /**
   * HTML für PDF generieren
   *
   * @param     string $title
   * @param     string $content
   * @return    string des für die PDF-Konvertierung formatierten Markups.
   *
   */
   public function htmlMarkup($title, $content);

   /**
    * Nomalisiert einen übergebenen Namen.
    *
    * @param     string $name
    */
    public function normalizeName($name);

}
