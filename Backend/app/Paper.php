<?php namespace Synthesise;

use Illuminate\Database\Eloquent\Model;

class Paper extends Model {

	/**
	 * Die Datenbanktabelle des Models.
	 *
	 * @var 		string
	 */
	protected $table = 'papers';

	/**
	 * Hauptschlüssel festlegen um die ORM Suche zu vereinfachen.
	 *
	 * @var 		string
	 * @todo 		Klären warum es Sinn macht einen anderen PK zu definieren.
	 */
	protected $primaryKey ='papername';

	/**
	 * Die veränderbaren Tabellenspalten.
	 *
	 * @var 		array
	 */
	protected $fillable = ['papername','author','video_videoname'];

	/**
	 * Datenbankrelation Paper gehört zu Video.
	 *
	 */
	public function video()
	{
		return $this->belongsTo('Video', 'video_videoname');
	}
}
