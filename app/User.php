<?php namespace Synthesise;

use Illuminate\Auth\UserTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Contracts\Auth\User as UserContract;
use Illuminate\Contracts\Auth\Remindable as RemindableContract;

class User extends Model implements UserContract, RemindableContract {

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
