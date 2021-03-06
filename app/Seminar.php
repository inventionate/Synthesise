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
    protected $fillable = [
        'name',
        'subject',
        'module',
        'author',
        'contact',
        'authorized_editors',
        'image_path',
        'info_intro',
        'info_lections',
        'info_texts',
        'info_exam',
        'info_dates',
        'info_path',
        'available_from',
        'available_to',
        'disqus_shortname',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'authorized_editors' => 'array',
    ];

    /**
     * Hauptschlüssel festlegen um die ORM Suche zu vereinfachen.
     *
     * @var string
     */
    protected $primaryKey = 'name';

    /**
     * Hauptschlüssel als nicht numerisch definieren und automatisches Inkrementieren deaktivieren.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * Datenbankrelation Seminar hat viele Sections.
     */
    public function sections()
    {
        return $this->hasMany('Synthesise\Section', 'seminar_name');
    }

    /**
     * Datenbankrelation Seminar hat viele Users.
     */
    public function users()
    {
        return $this->belongsToMany('Synthesise\User', 'seminar_user', 'seminar_name', 'user_id');
    }

    /**
     * Datenbankrelation Seminar hat viele Messages.
     */
    public function messages()
    {
        return $this->hasMany('Synthesise\Message', 'seminar_name');
    }

    /**
     * Datenbankrelation Seminar hat viele FAQs.
     */
    public function faqs()
    {
        return $this->hasMany('Synthesise\Faq', 'seminar_name');
    }

    /**
     * Datenbankrelation Seminar hat viele Infoblocks.
     */
    public function infoblocks()
    {
        return $this->hasMany('Synthesise\Infoblock', 'seminar_name');
    }

    /**
     * Datenbankrelation Lection hat viele Notes.
     */
    public function notes()
    {
        return $this->hasMany('Synthesise\Note', 'seminar_name');
    }
}
