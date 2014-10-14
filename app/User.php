<?php namespace Synthesise;

use Illuminate\Auth\UserTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\User as UserContract;
use Illuminate\Auth\Passwords\CanResetPasswordTrait;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements UserContract, CanResetPasswordContract {

	use UserTrait, CanResetPasswordTrait;

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
