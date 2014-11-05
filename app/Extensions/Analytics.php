<?php namespace Synthesise\Extensions;

use  Synthesise\Extensions\Contracts\Analytics as AnalyticsContract;

class Analytics implements AnalyticsContract {

  /**
   * Auth Token der Piwik Analytics API.
   *
   * @var     string
   */
  protected $tokenAuth;

  /**
   * Base URL  der Piwik Analytics API.
   *
   * @var     string
   */
  protected $baseUrl;

  /**
   * Constructor.
   *
   * @param     $tokenAuth
   * @param    $baseUrl
   */
  public function __construct($tokenAuth, $baseUrl)
  {
    $this->tokenAuth = $tokenAuth;
    $this->baseUrl = $baseUrl;
  }

  /**
   * CURL connection Piwik Analytics site.
   *
   * @param     $url Eine Piwik API Adresse mit aktiviertem JSON Format.
   * @return    array Die Daten als PHP Array.
   */
  private function fetchPiwik($url) {
    // Durchführen der API Abfrage mi CURL.
    $curl=curl_init();
    curl_setopt($curl, CURLOPT_URL,$url);
    curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 2);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_USERAGENT, 'Synthesise 2.7');
    $content = curl_exec($curl);
    curl_close($curl);
    // Dekodieren der Daten.
    return json_decode($content, TRUE);
  }

  /**
   * Summe aller Besuche nach unterschiedlichen Benutzergruppen.
   *
   * @param     $periodStart Anfangsdatum des abgefragten Zeitraums.
   * @return    array Besucherzahlen total der Admins, Mentoren und Studierenden.
   */
   public function getVisitors($periodStart = '2014-01-01')
   {
    // Piwik URL. Um diese zu generieren siehe Piwik API Dokumentation.
    $url = $this->baseUrl;
    $url .= 'index.php?module=API';
    $url .= '&method=CustomVariables.getCustomVariables';
    $url .= '&expanded=1';
    $url .= '&idSite=1';
    $url .= '&period=range';
    $url .= '&date='. $periodStart . ',today';
    $url .= '&format=JSON';
    $url .= '&token_auth=' . $this->tokenAuth;

    $content = $this->fetchPiwik($url);

    return [
      'admins' => $content[0]['subtable'][0]['nb_visits'],
      'mentors' => $content[0]['subtable'][1]['nb_visits'],
      'students' => $content[0]['subtable'][2]['nb_visits']
    ];
   }

  /**
   * Alle Besucher und Seitenaufrufe innerhalb eines bestimmten Zeitraums.
   *
   * @param     $firstMonth Anfangsdatum des abgefragten Zeitraums.
   * @param     $lastMonth Enddatum des abgefragten Zeitraums.
   * @return    array Seitenaufrufe und eindeutige Besucherzahlen.
   */
  public function getSemesterVisits($firstMonth = '2014-10-01', $lastMonth='2015-02-28')
  {
    // Piwik URL. Um diese zu generieren siehe Piwik API Dokumentation.
    $url = $this->baseUrl;
    $url .= 'index.php?module=API';
    $url .= '&method=API.get';
    $url .= '&expanded=1';
    $url .= '&idSite=1';
    $url .= '&period=month';
    $url .= '&date='. $firstMonth . ',' . $lastMonth;
    $url .= '&format=JSON';
    $url .= '&token_auth=' . $this->tokenAuth;

    $content = $this->fetchPiwik($url);
    // dd($content);
    $visits = array_fetch($content, 'nb_visits');
    $uniqVisitors = array_fetch($content,'nb_uniq_visitors');

    return [
      'visits' => $visits,
      'uniqVisitors' => $uniqVisitors
    ];
  }

  /**
   * Heruntergeladene Texte in einem Semester.
   *
   * @param     $firstMonth Anfangsdatum des abgefragten Zeitraums.
   * @param     $lastMonth Enddatum des abgefragten Zeitraums.
   * @return    array Anzahl der heruntergeladenen Texte.
   */
  public function downloadedPapers($firstMonth = '2014-10-01', $lastMonth='2015-02-28')
  {
    // Piwik URL. Um diese zu generieren siehe Piwik API Dokumentation.
    $url = $this->baseUrl;
    $url .= 'index.php?module=API';
    $url .= '&method=Events.getCategory';
    $url .= '&expanded=1';
    $url .= '&idSite=1';
    $url .= '&label=Text%20%26gt%3B%20%40Downloaded';
    $url .= '&period=month';
    $url .= '&date='. $firstMonth . ',' . $lastMonth;
    $url .= '&format=JSON';
    $url .= '&token_auth=' . $this->tokenAuth;

    $months = $this->fetchPiwik($url);

    // @todo Code verbessern!

    $downloadedPapers = [];

    foreach ( $months as $month )
    {
      if ( array_fetch($month, 'nb_events') )
      {
        $downloadedPapers = array_merge($downloadedPapers, array_fetch($month, 'nb_events'));
      }
      else
      {
        $downloadedPapers = array_merge($downloadedPapers, [0]);
      }
    }

    return json_encode($downloadedPapers);
  }

  /**
   * Angesehene Videos in einem Semester.
   *
   * @param     $firstMonth Anfangsdatum des abgefragten Zeitraums.
   * @param     $lastMonth Enddatum des abgefragten Zeitraums.
   * @return    array Anzahl der Videoplays.
   */
  public function playedVideos($firstMonth = '2014-10-01', $lastMonth='2015-02-28')
  {
    // Piwik URL. Um diese zu generieren siehe Piwik API Dokumentation.
    $url = $this->baseUrl;
    $url .= 'index.php?module=API';
    $url .= '&method=Events.getCategory';
    $url .= '&expanded=1';
    $url .= '&idSite=1';
    $url .= '&label=Video%20%26gt%3B%20%40Abgespielt';
    $url .= '&period=month';
    $url .= '&date='. $firstMonth . ',' . $lastMonth;
    $url .= '&format=JSON';
    $url .= '&token_auth=' . $this->tokenAuth;

    $months = $this->fetchPiwik($url);

    // @todo Code verbessern!

    $playedVideos = [];

    foreach ( $months as $month )
    {
      if ( array_fetch($month, 'nb_events') )
      {
        $playedVideos = array_merge($playedVideos, array_fetch($month, 'nb_events'));
      }
      else
      {
        $playedVideos = array_merge($playedVideos, [0]);
      }
    }

    return json_encode($playedVideos);
  }

}
