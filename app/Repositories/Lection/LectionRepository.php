<?php

namespace Synthesise\Repositories\Lection;

use Illuminate\Database\Eloquent\Model;

use Synthesise\Lection;
use Paper;
use User;

// Old
use Parser;
use DB;

class LectionRepository implements LectionInterface
{

    /**
     * Attach lection to section.
     *
     * @param int       $section_id
     * @param string    $name
     */
    public function attachToSection($section_id, $name)
    {
        return Lection::findOrFail($name)->sections()->attach($section_id);
    }

    /**
     * Detach lection from section.
     *
     * @param int       $section_id
     * @param string    $name
     */
    public function detachFromSection($section_id, $name)
    {
        return Lection::findOrFail($name)->sections()->detach($section_id);
    }

    /**
     * Store new lection.
     *
     * @param   string  $name
     * @param   int     $section_id
     * @param   string  $author
     * @param   mail    $contact
     * @param   file    $text
     * @param   string  $text_name
     * @param   string  $text_author
     * @param   image   $image
     * @param   date    $available_from
     * @param   date    $available_to
     * @param   array   $authorized_users
     * @param   string  $seminar_name
     */
    public function store($name, $section_id, $author, $contact, $text, $text_name, $text_author, $image, $available_from, $available_to, $authorized_users, $seminar_name)
    {
        // Save image.
        $image_saved = $image->move(storage_path('app/public/lections'), md5_file($image) . '.' . $image->getClientOriginalExtension());

        $image_path = 'storage/lections' . $image_saved->getFilename();

        // Save text.
        $text_saved = $text->move(storage_path('app/public/lections'), md5_file($text) . '.' . $text->getClientOriginalExtension());

        $text_path = 'storage/lections' . $text_saved->getFilename();

        if ( is_null($authorized_users) )
        {
            $authorized_users = [];
        }

        // Add admins
        $authorized_users = array_merge($authorized_users, User::getAllByRole('Admin')->pluck('username')->toArray());

        // Save lection.
        $lection = new Lection();

        $lection->name              = $name;
        $lection->author            = $author;
        $lection->contact           = $contact;
        $lection->image_path        = $image_path;
        $lection->available_from    = $available_from;
        $lection->available_to      = $available_to;
        $lection->authorized_editors  = $authorized_users;

        $lection->save();

        // Save text.
        Paper::store($text_name, $text_path, $text_author, $name);

        // Attach lection.
        $this->attachToSection($section_id, $name);
    }

    /**
     * Update an existing lection.
     *
     * @param   string  $name
     * @param   int     $section_id
     * @param   string  $author
     * @param   mail    $contact
     * @param   file    $text
     * @param   string  $text_name
     * @param   string  $text_author
     * @param   image   $image
     * @param   date    $available_from
     * @param   date    $available_to
     * @param   array   $authorized_users
     * @param   string  $seminar_name
     */
    public function update($name, $section_id, $author, $contact, $text, $text_name, $text_author, $image, $available_from, $available_to, $authorized_users, $seminar_name)
    {

        // @TODO

        // Save image.
        $image_saved = $image->move(storage_path('app/public/lections'), md5_file($image) . '.' . $image->getClientOriginalExtension());

        $image_path = 'storage/lections' . $image_saved->getFilename();

        // Save text.
        $text_saved = $text->move(storage_path('app/public/lections'), md5_file($text) . '.' . $text->getClientOriginalExtension());

        $text_path = 'storage/lections' . $text_saved->getFilename();

        // Save lection.
        $lection = new Lection();

        $lection->name              = $name;
        $lection->author            = $author;
        $lection->contact           = $contact;
        $lection->image_path        = $image_path;
        $lection->available_from    = $available_from;
        $lection->available_to      = $available_to;
        $lection->authorized_users  = $authorized_users;

        $lection->save();

        // Save text.
        Paper::store($text_name, $text_path, $text_author, $name);

        // Attach lection.
        $this->attachToSection($section_id, $name);
    }

    /**
     * Get all lections.
     *
     * @return    collection
     */
    public function getAll()
    {
        return Lection::all();
    }

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
   * @param     string $name
   *
   * @return    array
   */
  public function getPaper($name)
  {
      return Lection::findOrFail($name)->paper;
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
