<?php namespace Synthesise\Extensions\Contracts;

interface Analytics {

  /**
   * Summe aller Besuche nach unterschiedlichen Benutzergruppen.
   *
   * @param     $periodStart Anfangsdatum des abgefragten Zeitraums.
   * @return    array Besucherzahlen total der Admins, Mentoren und Studierenden.
   */
   public function getVisitors($periodStart);

  /**
   * Alle Besucher und Seitenaufrufe innerhalb eines bestimmten Zeitraums.
   *
   * @param     $firstMonth Anfangsdatum des abgefragten Zeitraums.
   * @param     $lastMonth Enddatum des abgefragten Zeitraums.
   * @return    array Seitenaufrufe und eindeutige Besucherzahlen.
   */
  public function getSemesterVisits($firstMonth, $lastMonth);

  /**
   * Heruntergeladene Texte in einem Semester.
   *
   * @param     $firstMonth Anfangsdatum des abgefragten Zeitraums.
   * @param     $lastMonth Enddatum des abgefragten Zeitraums.
   * @return    array Anzahl der heruntergeladenen Texte.
   */
  public function downloadedPapers($firstMonth, $lastMonth);

  /**
   * Angesehene Videos in einem Semester.
   *
   * @param     $firstMonth Anfangsdatum des abgefragten Zeitraums.
   * @param     $lastMonth Enddatum des abgefragten Zeitraums.
   * @return    array Anzahl der Videoplays.
   */
  public function playedVideos($firstMonth, $lastMonth);

}
