<?php

namespace Synthesise;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

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
    protected $hidden = [
        'password',
        'remember_token'
    ];

    /**
     * Die veränderbaren Tabellenspalten.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'password',
        'firstname',
        'lastname',
        'role',
        'email'
    ];

    /**
     * Datenbankrelation User hat viele Notes.
     */
    public function notes()
    {
        return $this->hasMany('Synthesise\Note', 'user_id');
    }

    /**
     * Datenbankrelation User gehören zu Seminaren.
     */
    public function seminars()
    {
        return $this->belongsToMany('Synthesise\Seminar', 'seminar_user', 'user_id', 'seminar_name');
    }
}
