<?php

namespace Synthesise;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
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
        'email',
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
