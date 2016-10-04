<?php

namespace Synthesise\Repositories\Note;

use Illuminate\Database\Eloquent\Model;

use Synthesise\Note;
use Lection;
use Crypt;

/**
 * Note Repository mit Queries und Logik.
 */
class NoteRepository implements NoteInterface
{

    /**
     * Get note by user id and cuepoint id.
     *
     * @param 		int     $cuepoint_id
     * @param 		string  $lection_name
     * @param 		int     $sequence
     *
     * @return 		int
     */
     private function getCuepointID($cuepoint_id, $lection_name, $sequence)
     {
        // Get real cuepoint id.
        $sequence = Lection::getSequence($lection_name, $sequence);

        $cuepoint_id = $cuepoint_id - 1;

        $id = $sequence->cuepoints()->get()->sortBy('cuepoint')->get($cuepoint_id)->id;

        return $id;
    }


  /**
   * Get note.
   *
   * @param 		int       $user_id
   * @param 		int       $cuepoint_id
   * @param 		string    $lection_name
   * @param 		string    $seminar_name
   * @param         int       $sequence
   *
   * @return 		string
   */
  public function get($user_id, $cuepoint_id, $lection_name, $seminar_name, $sequence)
  {
      $id = $this->getCuepointID($cuepoint_id, $lection_name, $sequence);

      $note = Note::where('user_id', '=', $user_id)->where('cuepoint_id', '=', $id)->where('lection_name', '=', $lection_name)->where('seminar_name', '=', $seminar_name)->pluck('note')->first();

      if ( $note !== null )
      {
          $note = Crypt::decrypt($note);
      }

      return $note;
  }

  /**
   * Store new note.
   *
   * @param 		int $user_id
   * @param 		int $cuepoint_id
   * @param 		string $lection_name
   * @param 		string $seminar_name
   * @param 		string $note_content
   * @param 		int $sequence
   *
   */
  public function store($user_id, $cuepoint_id, $lection_name, $seminar_name, $note_content, $sequence)
  {

      $id = $this->getCuepointID($cuepoint_id, $lection_name, $sequence);

      // Save cuepoint.
      $note = new Note;

      $note->note = Crypt::encrypt($note_content);
      $note->user_id = $user_id;
      $note->cuepoint_id = $id;
      $note->lection_name = $lection_name;
      $note->seminar_name = $seminar_name;

      $note->save();
  }

  /**
   * Update note.
   *
   * @param 		int $user_id
   * @param 		int $cuepoint_id
   * @param 		string $lection_name
   * @param 		string $seminar_name
   * @param 		string $note_content
   * @param 		int $sequence
   *
   */
  public function update($user_id, $cuepoint_id, $lection_name, $seminar_name, $note_content, $sequence)
  {
      $id = $this->getCuepointID($cuepoint_id, $lection_name, $sequence);

      // Update cuepoint.
      $note = Note::where('user_id', '=', $user_id)->where('cuepoint_id', '=', $id)->where('lection_name', '=', $lection_name)->where('seminar_name', '=', $seminar_name)->first();

      $note->note = Crypt::encrypt($note_content);

      $note->save();
  }

  /**
   * Get note by user id and cuepoint id.
   *
   * @param 		int $user_id
   * @param 		int $cuepoint_id
   * @param 		string $lection_name
   * @param 		string $seminar_name
   * @param 		string $note_content
   * @param 		int $sequence
   *
   */
  public function delete($user_id, $cuepoint_id, $lection_name, $seminar_name, $sequence)
  {
      $id = $this->getCuepointID($cuepoint_id, $lection_name, $sequence);

      $note = Note::where('user_id', '=', $user_id)->where('cuepoint_id', '=', $id)->where('lection_name', '=', $lection_name)->where('seminar_name', '=', $seminar_name)->first();

      $note->delete();
  }

}
