<?php namespace Synthesise\Extensions;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Input;

class Analytics {

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
   */
   public function getVisitors($periodStart = '2014-01-01')
   {
    // Piwik URL. Um diese zu generieren siehe Piwik API Dokumentation.
    $url = $this->baseUrl;
    $url .= 'index.php?module=API';
    $url .= '&method=CustomVariables.getCustomVariables';
    $url .= '&expanded=1';
    $url .= '&idSite=1&period=range&date='. $periodStart . ',today';
    $url .= '&format=JSON';
    $url .= '&token_auth=' . $this->tokenAuth;

    $content = $this->fetchPiwik($url);

    return $content[0]['subtable'][0]['nb_visits'];
   }

}
