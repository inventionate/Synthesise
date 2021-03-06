<?php

namespace Synthesise;

use Illuminate\Database\Eloquent\Model;

class Lection extends Model
{
    /**
     * Die Datenbanktabelle des Models.
     *
     * @var string
     */
    protected $table = 'lections';

    /**
     * Die veränderbaren Tabellenspalten.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'author',
        'contact',
        'authorized_editors',
        'image_path',
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
     * @var boolean
     */
    public $incrementing = false;

    /**
     * Datenbankrelation Lection hat ein Paper.
     */
    public function paper()
    {
        return $this->hasOne('Synthesise\Paper', 'lection_name');
    }

    /**
     * Datenbankrelation Lection hat viele Papers.
     */
    public function sequences()
    {
        return $this->hasMany('Synthesise\Sequence', 'lection_name');
    }

    /**
     * Datenbankrelation Lection gehören zu Seminaren.
     */
    public function sections()
    {
        return $this->belongsToMany('Synthesise\Section', 'lection_section', 'lection_name', 'section_id')->withPivot('available_from', 'available_to');
    }

    /**
     * Datenbankrelation Lection hat viele Notes.
     */
    public function notes()
    {
        return $this->hasMany('Synthesise\Note', 'lection_name');
    }
}
