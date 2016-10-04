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
		'lection_name',
		'seminar_name'
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
	* Datenbankrelation Note gehört zu lection.
	*
	*/
	public function lection()
	{
		return $this->belongsTo('Synthesise\Lection','lection_name');
	}

	/**
     * Datenbankrelation Note gehört zu seminar.
     */
    public function seminar()
    {
        return $this->belongsTo('Synthesise\Seminar', 'seminar_name');
    }

}
