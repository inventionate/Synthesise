<?php namespace Synthesise\Repositories\Note;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

/**
 * Note Repository mit Queries und Logik.
 */
class NoteRepository implements NoteInterface
{
  /**
   * Variable des zugrundeliegenden Eloquent Models.
   *
   */
  protected $noteModel;

  /**
   * Initziiert die Klasse $faqModel mit dem injizierten Model.
   *
   * @param Model $faq
   * @return FaqRepository
   */
  public function __construct(Model $note)
  {
    $this->noteModel = $note;
  }

  /**
   * ID der Note abfragen.
   *
   * @param 		int $userId
   * @param 		int $cuepointId
   * @return 		int ID der Notiz.
   */
  public function getNoteId($userId, $cuepointId)
  {
    return $this->noteModel->where('user_id', '=', $userId)->where('cuepoint_id','=',$cuepointId)->pluck('id');
  }

  /**
   * Notiz abfragen
   *
   * @param 		int $userId
    * @param 		int $cuepointId
   * @return 		string Inhalt der Notiz.
   */
  public function getContent($userId, $cuepointId)
  {

    $note = $this->noteModel->where('user_id', '=', $userId)->where('cuepoint_id','=',$cuepointId)->pluck('note');

    if(empty($note)) {
      return '';
    }
    else {
      return Crypt::decrypt($this->noteModel->where('user_id', '=', $userId)->where('cuepoint_id','=',$cuepointId)->pluck('note'));
    }

  }

  /**
   * Inhalt einer Notiz aktualisieren.
   *
   * @param 		string $noteContent
   * @param 		int $userId
   * @param 		int $cuepointId
   * @param 		string $videoname
   * @return    void
   */
  public function updateContent($noteContent, $userId, $cuepointId, $videoname)
  {

    $noteId = self::getNoteId($userId,$cuepointId);

    // Abfragen ob Note existiert
    if(empty($noteId))
    {
      // Neue Notiz generieren
      $note = new $this->noteModel;
      // Notiz mit Inhalt füllen
      $note->note = Crypt::encrypt($noteContent);
      $note->user_id = $userId;
      $note->cuepoint_id = $cuepointId;
      $note->video_videoname = $videoname;
      // Notiz speichern
      $note->save();
    }
    else
    {
      // Die zu aktualisierende Notiz aufrufen
      $note = $this->noteModel->find($noteId);
      // Überprüfen ob die Notiz gelöscht werden kann
      if($noteContent != '')
      {
        // Inhalt verändern
        $note->note = Crypt::encrypt($noteContent);
        // Neuen Inhalt speichern
        $note->save();
      } elseif($noteContent === '')
      {
        // Notiz löschen
        $note->delete();
      }
    }
  }
}
