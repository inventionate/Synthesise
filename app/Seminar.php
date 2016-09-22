<?php

namespace Synthesise;

use Illuminate\Database\Eloquent\Model;

class Seminar extends Model
{
    /**
     * Die Datenbanktabelle des Models.
     *
     * @var string
     */
    protected $table = 'seminars';

    /**
     * Die veränderbaren Tabellenspalten.
     *
     * @var array
     */
    protected $fillable = ['seminarname','subject','author','online','available_from','available_to'];

    /**
     * Hauptschlüssel festlegen um die ORM Suche zu vereinfachen.
     *
     * @var string
     */
    protected $primaryKey = 'seminarname';

    /**
     * Hauptschlüssel als nicht numerisch definieren und automatisches Inkrementieren deaktivieren.
     *
     * @var boolean
     */
    public $incrementing = false;

    /**
     * Datenbankrelation Seminar hat viele Videos.
     */
    public function videos()
    {
        return $this->belongsToMany('Synthesise\Video');
    }

    /**
     * Datenbankrelation Seminar hat viele Users.
     */
    public function users()
    {
        return $this->belongsToMany('Synthesise\User');
    }

    /**
     * Datenbankrelation Seminar hat viele Messages.
     */
    public function messages()
    {
        return $this->hasMany('Synthesise\Message');
    }

    /**
     * Datenbankrelation Seminar hat viele FAQs.
     */
    public function faqs()
    {
        return $this->hasMany('Synthesise\Faq');
    }

}
