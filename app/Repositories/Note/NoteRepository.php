<?php

namespace Synthesise\Repositories\Note;

use Illuminate\Database\Eloquent\Model;

use Synthesise\Note;
use Crypt;

/**
 * Note Repository mit Queries und Logik.
 */
class NoteRepository implements NoteInterface
{


  /**
   * Get note by user id and cuepoint id.
   *
   * @param 		int $user_id
   * @param 		int $cuepoint_id
   * @param 		int $lection_name
   * @param 		int $seminar_name
   *
   * @return 		string
   */
  public function get($user_id, $cuepoint_id, $lection_name, $seminar_name)
  {
      $note = Note::where('user_id', '=', $user_id)->where('cuepoint_id', '=', $cuepoint_id)->where('lection_name', '=', $lection_name)->where('seminar_name', '=', $seminar_name)->pluck('note')->first();

      if ( $note !== null )
      {
          $note = Crypt::decrypt($note);
      }

      return $note;
  }

  /**
   * Get note by user id and cuepoint id.
   *
   * @param 		int $user_id
   * @param 		int $cuepoint_id
   * @param 		int $lection_name
   * @param 		int $seminar_name
   * @param 		int $note_content
   *
   * @return 		string
   */
  public function store($user_id, $cuepoint_id, $lection_name, $seminar_name, $note_content)
  {
      $note = new Note;

      $note->note = Crypt::encrypt($note_content);
      $note->user_id = $user_id;
      $note->cuepoint_id = $cuepoint_id;
      $note->lection_name = $lection_name;
      $note->seminar_name = $seminar_name;

      $note->save();
  }

  public function update($user_id, $cuepoint_id, $lection_name, $seminar_name, $note_content)
  {
      $note = Note::where('user_id', '=', $user_id)->where('cuepoint_id', '=', $cuepoint_id)->where('lection_name', '=', $lection_name)->where('seminar_name', '=', $seminar_name)->first();

      $note->note = Crypt::encrypt($note_content);

      $note->save();
  }

  public function delete($user_id, $cuepoint_id, $lection_name, $seminar_name)
  {
      $note = Note::where('user_id', '=', $user_id)->where('cuepoint_id', '=', $cuepoint_id)->where('lection_name', '=', $lection_name)->where('seminar_name', '=', $seminar_name)->first();

      $note->delete();
  }

}
