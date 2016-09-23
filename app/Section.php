<?php

namespace Synthesise;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    /**
	 * Die Datenbanktabelle des Models.
	 *
	 * @var 		string
	 */
	protected $table = 'sections';

	/**
	 * Hauptschlüssel festlegen um die ORM Suche zu vereinfachen.
	 *
	 * @var 		string
	 */
	protected $primaryKey ='name';

	/**
     * Hauptschlüssel als nicht numerisch definieren und automatisches Inkrementieren deaktivieren.
     *
     * @var boolean
     */
    public $incrementing = false;

	/**
	 * Die veränderbaren Tabellenspalten.
	 *
	 * @var 		array
	 */
	protected $fillable = [
		'name',
		'further_reading_path',
		'seminar_name',
		'lection_name'
	];

	/**
	 * Datenbankrelation Section gehört zu Seminar.
	 *
	 */
	public function seminar()
	{
		return $this->belongsTo('Synthesise\Seminar', 'seminar_name');
	}

    /**
	 * Datenbankrelation Section hat viele Lections.
	 *
	 */
	public function lections()
	{
		return $this->belongsToMany('Synthesise\Lection', 'lection_section',  'section_name', 'lection_name');
	}
}
