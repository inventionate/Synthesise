<?php

class Note extends \Eloquent {

	/**
	 * Die Datenbanktabelle des Models.
	 *
	 * @var string
	 */
	protected $table = 'notes';

	/**
	 * Die veränderbaren Tabellenspalten.
	 *
	 * @var array
	 */
	protected $fillable = ['note','user_id','cuepoint_id','video_videoname'];

	/**
	 * Datenbankrelation Note gehört zu User.
	 *
	 */
	public function user()
	{
		return $this->belongsTo('User');
	}

	/**
	 * Datenbankrelation Note gehört zu Cuepoint.
	 *
	 */
	public function cuepoint()
	{
		return $this->belongsTo('Cuepoint');
	}

	/**
	* Datenbankrelation Note gehört zu Video.
	*
	*/
	public function video()
	{
		return $this->belongsTo('Video','video_videoname');
	}

	/**
	 * ID der Note abfragen.
	 *
	 * @param 		int $userId
	 * @param 		int $cuepointId
	 * @return 		int ID der Notiz.
	 */
	public static function getNoteId($userId, $cuepointId)
	{
		return Note::where('user_id', '=', $userId)->where('cuepoint_id','=',$cuepointId)->pluck('id');
	}

	/**
	 * Notiz abfragen
	 *
	 * @param 		int $userId
 	 * @param 		int $cuepointId
	 * @return 		string Inhalt der Notiz.
	 */
	public static function getContent($userId, $cuepointId)
	{

		$note = Note::where('user_id', '=', $userId)->where('cuepoint_id','=',$cuepointId)->pluck('note');

		if(empty($note)) {
			return '';
		}
		else {
			return Crypt::decrypt(Note::where('user_id', '=', $userId)->where('cuepoint_id','=',$cuepointId)->pluck('note'));
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
	public static function updateContent($noteContent, $userId, $cuepointId, $videoname)
	{

		$noteId = self::getNoteId($userId,$cuepointId);

		// Abfragen ob Note existiert
		if(empty($noteId))
		{
			// Neue Notiz generieren
			$note = new Note;
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
			$note = Note::find($noteId);
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
