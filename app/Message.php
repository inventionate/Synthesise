<?php namespace Synthesise;

use Illuminate\Database\Eloquent\Model;

class Message extends Model {

	/**
	* Die Datenbanktabelle des Models.
	*
	* @var 		string
	*/
	protected $table = 'messages';

	/**
	* Die veränderbaren Tabellenspalten.
	*
	* @var 		array
	*/
	protected $fillable = [
		'id',
		'title',
		'content',
		'colour',
		'seminar_name'
	];

	/**
     * Datenbankrelation Message gehört zu einem Seminar.
     */
    public function seminar()
    {
        return $this->belongsTo('Synthesise\Seminar', 'seminar_name');
    }

}
