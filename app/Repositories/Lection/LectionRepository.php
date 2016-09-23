<?php

namespace Synthesise\Repositories\Lection;

use Illuminate\Database\Eloquent\Model;

use Synthesise\Lection;
use Parser;
use DB;

class LectionRepository implements LectionInterface
{
  /**
   * Checkt die Verfügbarkeit eines Videos.
   *
   * @param 		string $videoname
   *
   * @return    true|false Gibt wahr oder falsch bzgl. der Verfügbarkeit zurück.
   */
  public function available($videoname)
  {
      if ($this->unlockDate($videoname) <= date('Y-m-d')) {
          return true;
      } else {
          return false;
      }
  }

  /**
   * Fragt die Sektion eines Videos ab.
   *
   * @param     string $videoname
   *
   * @return    string Aktuelle Sektion.
   */
  public function getSection($videoname)
  {
      return Lection::find($videoname)->section;
  }
  /**
   * Fragt ab ab welchem Datum das Video freigeschaltet ist.
   *
   * @param     string $videoname
   *
   * @return    string Datum ab wann das Video verfügbar ist.
   */
  public function unlockDate($videoname)
  {
      return Lection::find($videoname)->available_from;
  }

  /**
   * Fragt ab bis zu welchem Datum das Video freigeschaltet ist.
   *
   * @param     string $videoname
   *
   * @return    string Datum bis wann das Video verfügbar ist.
   */
  public function finalDate($videoname)
  {
      return Lection::find($videoname)->available_to;
  }

  /**
   * Onlinestatus abfragen.
   *
   * @param     string $videoname
   *
   * @return    true|false
   */
  public function getOnline($videoname)
  {
      return Lection::find($videoname)->online;
  }

  /**
   * Das aktuelle Video abfragen.
   *
   * @return    array|false Gibt entweder das aktuelle Video oder false zurück.
   */
  public function getCurrentVideo()
  {
      $video = DB::table('videos')->where('available_from', '<=', date('Y-m-d'))->orderBy('available_from', 'desc')->first();

      if (empty($video)) {
          return false;
      } else {
          return $video;
      }
  }

  /**
   * Gibt alle Videos zurück.
   *
   * @return    array Alle Videos.
   *
   * @todo 			Verallgemeinern, da auf 11 Videos zugeschnitten. Statt ->take(11) eher ->all().
   */
  public function getVideos()
  {
      return Lection::all()->take(11);
  }

  /**
   * Gibt die zu einem Video zugehörigen Papers aus.
   *
   * @param     string $videoname
   *
   * @return    array
   */
  public function getPapers($videoname)
  {
      return Lection::findOrFail($videoname)->papers;
  }

  /**
   * Gibt die zu einem Video zugehörigen Fähncheninhalte aus.
   *
   * @param     string $videoname
   *
   * @return    array
   */
  public function getFlagnames($videoname, $sequenceNumber)
  {
      return Lection::findOrFail($videoname)->cuepoints()->where('video_sequence_id', $sequenceNumber)->lists('content');
  }

  /**
   * Gibt die zu einem Video zugehörigen Cuepoints (Zeitpunkte) aus.
   *
   * @param     string  $videoname
   * @param     int     $sequenceNumber
   *
   * @return    array
   */
  public function getCuepoints($videoname, $sequenceNumber)
  {
      return Lection::findOrFail($videoname)->cuepoints()->where('video_sequence_id', $sequenceNumber)->get();
  }

  /**
   * Gibt die ID des ersten Cuepoints eines Videos aus.
   *
   * @param     string  $videoname
   * @param     int     $sequenceNumber
   *
   * @return    int
   */
  public function getFirstCuepointId($videoname, $sequenceNumber)
  {
      return Lection::findOrFail($videoname)->cuepoints()->where('video_sequence_id', $sequenceNumber)->first()->id;
  }

  /**
   * Gibt alle Fähncheninhalte als HTML aus.
   *
   * @uses 			Parser::htmlMarkup um das HTML Markup zu generieren.
   *
   * @param     string $videoname
   *
   * @return    string HTML Markup aller Fähncheninhalte.
   */
  public function getAllFlagnamesAsHTML($videoname, $sequenceNumber)
  {
      $cuepoints = Lection::findOrFail($videoname)->cuepoints()->where('video_sequence_id', $sequenceNumber)->get();
      $content = '';

      foreach ($cuepoints as $cuepoint) {
          $content .= '<h2 style="height:250px;">'.$cuepoint->content.'</h2>';
      }

      return Parser::htmlMarkup($videoname, $content);
  }

  /**
   * Gibt alle Marker als JS-Objekte zurück.
   *
   * @param     string  $videoname
   * @param     int     $sequenceNumber
   *
   * @return    json Markertitel und Markerposition.
   */
  public function getMarkers($videoname, $sequenceNumber)
  {
      // {time: 60, text: "this"}

    $cuepoints = Lection::findOrFail($videoname)->cuepoints()->where('video_sequence_id', $sequenceNumber)->get();

      $markers = [];

      foreach ($cuepoints as $cuepoint) {
          array_push($markers, ['time' => $cuepoint['cuepoint'], 'text' => $cuepoint['content']]);
      }

      return json_encode($markers);
  }

  /**
   * Gibt die Sequenzen zurück.
   *
   * @param     string $videoname
   *
   * @return    array Sequenzennummern und Sequenznamen.
   */
  public function getSequences($videoname)
  {
      $sequenceNumbers = Lection::where('videoname', $videoname)->select('sequence_id', 'sequence_name')->get()->toArray();

      return $sequenceNumbers;
  }
}