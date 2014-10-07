<?php namespace Synthesise\Extensions;

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
    $url .= "?module=API&method=VisitsSummary.getUniqueVisitors";
    $url .= "&idSite=1&period=day&date=today";
    $url .= "&format=json";
    $url .= "&token_auth=".$this->tokenAuth;

    $content = file_get_contents('https://etpm-analytics.ph-karlsruhe.de/?module=API&method=VisitsSummary.getUniqueVisitors&idSite=1&period=day&date=today&format=json&token_auth=22050cb4e8db16196138632a000ed946');

    //$content = unserialize($fetched);

     // case error
    // if (!$content) {
    //     print("Error, content fetched = " . $fetched);
    // }


    dd($content);

    //  print("<h1>Keywords for the last month</h1>");
    //  foreach ($content as $row) {
    //      $keyword = htmlspecialchars(html_entity_decode(urldecode($row['label']), ENT_QUOTES), ENT_QUOTES);
    //      $hits = $row['nb_visits'];
     //
    //      print("<b>$keyword</b> ($hits hits)<br>");
    //  }
   }

}
