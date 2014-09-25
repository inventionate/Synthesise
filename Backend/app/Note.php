<?php namespace Synthesise;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class Note extends Model {

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
		return $this->belongsTo('Synthesise\User');
	}

	/**
	 * Datenbankrelation Note gehört zu Cuepoint.
	 *
	 */
	public function cuepoint()
	{
		return $this->belongsTo('Synthesise\Cuepoint');
	}

	/**
	* Datenbankrelation Note gehört zu Video.
	*
	*/
	public function video()
	{
		return $this->belongsTo('Synthesise\Video','video_videoname');
	}

}
