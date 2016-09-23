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
   * ID der Note abfragen.
   *
   * @param 		int $userId
   * @param 		int $cuepointId
   *
   * @return 		int ID der Notiz.
   */
  public function getNoteId($userId, $cuepointId)
  {
      return Note::where('user_id', '=', $userId)->where('cuepoint_id', '=', $cuepointId)->pluck('id')->first();
  }

  /**
   * Notiz abfragen.
   *
   * @param 		int $userId
   * @param 		int $cuepointId
   *
   * @return 		string Inhalt der Notiz.
   */
  public function getContent($userId, $cuepointId)
  {
      $note = Note::where('user_id', '=', $userId)->where('cuepoint_id', '=', $cuepointId)->pluck('note')->all();

      if (empty($note)) {
          return '';
      } else {
          return Crypt::decrypt(Note::where('user_id', '=', $userId)->where('cuepoint_id', '=', $cuepointId)->pluck('note'));
      }
  }

  /**
   * Inhalt einer Notiz aktualisieren.
   *
   * @param 		string $noteContent
   * @param 		int $userId
   * @param 		int $cuepointId
   * @param 		string $videoname
   */
  public function updateContent($noteContent, $userId, $cuepointId, $videoname)
  {
      $noteId = self::getNoteId($userId, $cuepointId);
    // Abfragen ob Note existiert
    if (empty($noteId)) {
        // Neue Notiz generieren
      $note = new $this->noteModel();
      // Notiz mit Inhalt füllen
      $note->note = Crypt::encrypt($noteContent);
        $note->user_id = $userId;
        $note->cuepoint_id = $cuepointId;
        $note->video_videoname = $videoname;
      // Notiz speichern
      $note->save();
    } else {
        // Die zu aktualisierende Notiz aufrufen
      $note = Note::find($noteId);
      // Überprüfen ob die Notiz gelöscht werden kann
      if ($noteContent != '[#empty#]') {
          // Inhalt verändern
        $note->note = Crypt::encrypt($noteContent);
        // Neuen Inhalt speichern
        $note->save();
      } elseif ($noteContent === '[#empty#]') {
          // Notiz löschen
        $note->delete();
      }
    }
  }
}
