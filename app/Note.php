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
	protected $fillable = [
		'note',
		'user_id',
		'cuepoint_id',
		'sequence_id'
	];

	/**
	 * Datenbankrelation Note gehört zu User.
	 *
	 */
	public function user()
	{
		return $this->belongsTo('Synthesise\User', 'user_id');
	}

	/**
	 * Datenbankrelation Note gehört zu Cuepoint.
	 *
	 */
	public function cuepoint()
	{
		return $this->belongsTo('Synthesise\Cuepoint', 'cuepoint_id');
	}

	/**
	* Datenbankrelation Note gehört zu SDO_Sequence.
	*
	*/
	public function sequence()
	{
		return $this->belongsTo('Synthesise\Sequence','sequence_id');
	}

}
