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
	 * Die veränderbaren Tabellenspalten.
	 *
	 * @var 		array
	 */
	protected $fillable = [
		'name',
		'further_reading_path',
		'seminar_name',
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
		return $this->belongsToMany('Synthesise\Lection', 'lection_section',  'section_id', 'lection_name');
	}
}
