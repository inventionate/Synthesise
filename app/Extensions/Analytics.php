<?php namespace Synthesise\Extensions;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Input;

class Analytics {

  /**
   * Auth Token der Piwik Analytics API.
   *
   */
   protected $tokenAuth = '22050cb4e8db16196138632a000ed946';

   protected $baseUrl = 'https://etpm-analytics.ph-karlsruhe.de/';

  /**
   * Aktuelle Besucher in Echtzeit.
   *
   * @param     string
   * @return    json
   */
   public function getLiveVisitors()
   {
    $url = $this->baseUrl;
    $url .= "?module=API&method=DevicesDetection.getType";
    $url .= "&idSite=1&period=day&date=today";
    $url .= "&format=json";
    $url .= "&token_auth=".$this->tokenAuth;

    // CURL anstatt fopen verwenden, da durch den Server blockiert.
    $curl_handle=curl_init();
    curl_setopt($curl_handle, CURLOPT_URL,$url);
    curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2);
    curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl_handle, CURLOPT_USERAGENT, 'Synthesise 2.7');
    $content = curl_exec($curl_handle);
    curl_close($curl_handle);

    $content = json_decode($content, TRUE);

    $test = $content[0];


    return $test['nb_actions'];

   }

}
