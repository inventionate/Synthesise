<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');
	
	/**
	 * Durchsucht die Datenbank nach einem übergebenen Nutzernamen
	 * @author Fabian Mundt <f.mundt@ph-karlsruhe.de>
	 */
	public static function findByUsername(
		$username,
		$columns = array('*')
	) {
		if ( ! is_null($user = static::whereUsername($username)->first($columns))) {
			return $user;
		}
		else
		{
			return null;
		}
	}

}
