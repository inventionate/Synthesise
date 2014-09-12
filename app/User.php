<?php namespace Synthesise;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Model implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * Die Datenbanktabelle des Models.
	 *
	 * @var 		string
	 */
	protected $table = 'users';

	/**
	* Die veränderbaren Tabellenspalten.
	*
	* @var 		array
	*/
	protected $fillable = ['username','password','firstname','lastname','role','permissions'];

	/**
	 * Datenbankrelation User hat viele Notes.
	 *
	 */
	public function notes()
	{
		return $this->hasMany('Synthesise\Note');
	}

	/**
	 * Attribute die von der JSON Form des Models ausgeschlossen werden.
	 *
	 * @var 		array
	 */
	protected $hidden = array('password', 'remember_token');

}
