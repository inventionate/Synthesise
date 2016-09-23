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
        'authorized_editors',
        'image_path',
        'section_name',
        'available_from',
        'available_to'];

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
     * Datenbankrelation Lection hat viele Papers.
     */
    public function papers()
    {
        return $this->hasMany('Synthesise\Paper', 'lection_name');
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
        return $this->belongsToMany('Synthesise\Section', 'lection_section', 'lection_name', 'section_name');
    }
}
