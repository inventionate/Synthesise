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
	protected $fillable = ['message','type'];

}
