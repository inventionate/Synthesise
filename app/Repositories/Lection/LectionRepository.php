<?php

namespace Synthesise\Repositories\Lection;

use Illuminate\Database\Eloquent\Model;

use Synthesise\Lection;
use Paper;
use User;
use Seminar;
use Auth;


class LectionRepository implements LectionInterface
{

    /**
     * Attach lection to section.
     *
     * @param int       $section_id
     * @param string    $name
     * @param date      $available_from
     * @param date      $available_to
     */
    public function attachToSection($section_id, $name, $available_from, $available_to)
    {
        return Lection::findOrFail($name)->sections()->attach($section_id, ['available_from' => $available_from, 'available_to' => $available_to]);
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
     * @param   string  $available_from
     * @param   string  $available_to
     * @param   array   $authorized_users
     * @param   string  $seminar_name
     */
    public function store($name, $section_id, $author, $contact, $text, $text_name, $text_author, $image, $available_from, $available_to, $authorized_users, $seminar_name)
    {
        // Save image.
        $image_saved = $image->move(storage_path('app/public/lections'), md5_file($image) . '.' . $image->getClientOriginalExtension());

        $image_path = 'storage/lections/' . $image_saved->getFilename();

        // Check if no users selected.
        if ( is_null($authorized_users) )
        {
            $authorized_users = [];
        }

        // Add admins.
        $authorized_users = array_merge($authorized_users, User::getAllByRole('Admin')->pluck('username')->toArray());

        // Add Auth::user.
        if ( ! in_array(Auth::user()->username, $authorized_users) )
        {
            $authorized_users = array_merge($authorized_users, [Auth::user()->username]);
        }

        // Save lection.
        $lection = new Lection();

        $lection->name              = $name;
        $lection->author            = $author;
        $lection->contact           = $contact;
        $lection->image_path        = $image_path;
        $lection->authorized_editors  = $authorized_users;

        $lection->save();

        // Save text.
        Paper::store($text, $text_name, $text_author, $name);

        // Attach lection.
        $available_from    = date('Y-m-d', strtotime($available_from));
        $available_to      = date('Y-m-d', strtotime($available_to));

        $this->attachToSection($section_id, $name, $available_from, $available_to);
    }

    /**
     * Update an existing lection.
     *
     * @param   string  $name
     * @param   int     $section_id
     * @param   int     $old_section_id
     * @param   string  $author
     * @param   mail    $contact
     * @param   file    $text
     * @param   string  $text_name
     * @param   string  $text_author
     * @param   image   $image
     * @param   string  $available_from
     * @param   string  $available_to
     * @param   array   $authorized_users
     * @param   string  $seminar_name
     */
    public function update($name, $section_id, $old_section_id, $author, $contact, $text, $text_name, $text_author, $image, $available_from, $available_to, $authorized_users, $seminar_name)
    {
        // Find lection.
        $lection = Lection::findOrFail($name);

        // Check if no users selected.
        if ( is_null($authorized_users) )
        {
            $authorized_users = [];
        }

        // Add admins.
        $authorized_users = array_merge($authorized_users, User::getAllByRole('Admin')->pluck('username')->toArray());

        // Add Auth::user.
        if ( ! in_array(Auth::user()->username, $authorized_users) )
        {
            $authorized_users = array_merge($authorized_users, [Auth::user()->username]);
        }

        // Update values.
        $lection->author              = $author;
        $lection->contact             = $contact;
        $lection->authorized_editors  = $authorized_users;

        // Check new image.
        if( $image !== null )
        {
            // Remove old image.
            if ( Lection::where('image_path', $lection->image_path)->count() === 1 )
            {
                // @TODO: Sobald Laravel 5.3 verwendet werden kann, alles auf Storage umstellen! Hierzu kann ein symbolischer Link erstellt werden: 'php artisan storage:link'
                File::delete( $lection->image_path );
            }

            // Save new image.
            $image_saved = $image->move(storage_path('app/public/lections'), md5_file($image) . '.' . $image->getClientOriginalExtension());

            $image_path = 'storage/lections/' . $image_saved->getFilename();

            $lection->image_path = $image_path;
        }

        // Save updated lection.
        $lection->save();

        // Save text.
        Paper::update($text, $text_name, $text_author, $name);

        // Attach lection.

        $this->detachFromSection($old_section_id, $name);

        // Attach lection.
        $available_from    = date('Y-m-d', strtotime($available_from));
        $available_to      = date('Y-m-d', strtotime($available_to));

        $this->attachToSection($section_id, $name, $available_from, $available_to);
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
     * Get all not attached lections.
     *
     * @param    string    $seminar_name
     *
     * @return   collection
     */
    public function getAllNotAttached($seminar_name)
    {
        // All lections.
        $all_lections = $this->getAll();

        // All lections of a specific seminar.
        $seminar_lections = Seminar::getAllLections($seminar_name);

        $available_lections = $all_lections->diff($seminar_lections);

        return $available_lections;
    }

    /**
     * Get specific lection.
     *
     * @param 	string $name
     * @param 	string $seminar_name
     *
     * @return    collection
     */
    public function get($name, $seminar_name)
    {
        return Lection::findOrFail($name)->sections()->where('seminar_name', $seminar_name)->get();
    }

  /**
   * Check if lection is available.
   *
   * @param 	string $name
   * @param 	string $seminar_name
   *
   * @return    boolean
   */
  public function available($name, $seminar_name)
  {

      $lection = $this->get($name, $seminar_name);

      $available_from = $lection->first()->pivot->available_from;

      $available_to = $lection->first()->pivot->available_to;

      if ( $available_from <= date('Y-m-d') && $available_to >= date('Y-m-d'))
      {
          return true;
      }
      else
      {
          return false;
      }
  }

  /**
   * Get section of lection.
   *
   * @param     string $name
   * @param     string $seminar_name
   *
   * @return    string Aktuelle Sektion.
   */
  public function getSection($name, $seminar_name)
  {
      $lection = $this->get($name, $seminar_name);

      return $lection->first()->name;
  }

  /**
   * Get amount of sequences as spelled word.
   *
   * @param     string $name
   *
   * @return    string Sequence count.
   */
  public function getSequenceCount($name)
  {

      $sequence_count = Lection::findOrFail($name)->sequences()->count();

      return $sequence_count;
  }

  /**
   * Get amount of sequences as spelled word.
   *
   * @param     string $name
   *
   * @return    string Spelled sequence count.
   */
  public function getSequenceCountSpelled($name)
  {

      $sequence_count = $this->getSequenceCount($name);

      $sequence_formatter = new \NumberFormatter("en", \NumberFormatter::SPELLOUT);

      $sequence_count_spelled = $sequence_formatter->format($sequence_count);

      return $sequence_count_spelled;
  }

  /**
   * Get all sequences.
   *
   * @param     string $name
   *
   * @return    collection
   */
  public function getSequences($name)
  {
      return Lection::findOrFail($name)->sequences()->get();
  }

  /**
   * Get sequence.
   *
   * @param     string $name
   * @param     int    $sequence
   *
   * @return    collection
   */
  public function getSequence($name, $sequence)
  {
      return Lection::findOrFail($name)->sequences()->where('position', $sequence)->first();
  }

  /**
   * Get all markers.
   *
   * @param     string  $name
   * @param     int     $sequence
   *
   * @return    json
   */
  public function getMarkers($name, $sequence)
  {
      // {time: 60, text: "this"}

      $cuepoints = Lection::findOrFail($name)->sequences()->where('position', $sequence)->first()->cuepoints()->get();

      $markers = [];

      foreach ($cuepoints as $cuepoint) {
          array_push($markers, ['time' => $cuepoint['cuepoint'], 'text' => $cuepoint['content']]);
      }

      return json_encode($markers);
  }

  /**
   * Get image path.
   *
   * @param     string $name
   *
   * @return    collection
   */
  public function getImagePath($name)
  {
      return Lection::findOrFail($name)->image_path;
  }

  /**
   * Gibt die zu einem Video zugehörigen Papers aus.
   *
   * @param     string $name
   *
   * @return    collection
   */
  public function getPaper($name)
  {
      return Lection::findOrFail($name)->paper()->first();
  }

}
