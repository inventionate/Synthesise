<?php

namespace Synthesise;

use Illuminate\Database\Eloquent\Model;

class Infoblock extends Model
{
    /**
	 * Die Datenbanktabelle des Models.
	 *
	 * @var 		string
	 */
	protected $table = 'infoblocks';

	/**
	 * Die veränderbaren Tabellenspalten.
	 *
	 * @var 		array
	 */
	protected $fillable = [
		'name',
		'content',
		'image_path',
		'link_url',
        'seminar_name'
	];

	/**
	 * Datenbankrelation Infoblock gehört zu Seminar.
	 *
	 */
	public function seminar()
	{
		return $this->belongsTo('Synthesise\Seminar', 'seminar_name');
	}

}
