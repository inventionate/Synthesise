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
	 * Die veränderbaren Tabellenspalten.
	 *
	 * @var 		array
	 */
	protected $fillable = [
		'name',
		'author',
		'path',
		'lection_name'
	];

	/**
     * Hauptschlüssel festlegen um die ORM Suche zu vereinfachen.
     *
     * @var string
     */
    protected $primaryKey = 'name';

    /**
     * Hauptschlüssel als nicht numerisch definieren und automatisches Inkrementieren deaktivieren.
     *
     * @var boolean
     */
    public $incrementing = false;

	/**
	 * Datenbankrelation Paper gehört zu Lection.
	 *
	 */
	public function lection()
	{
		return $this->belongsTo('Synthesise\Lection', 'lection_name');
	}
}
