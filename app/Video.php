<?php

namespace Synthesise;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    /**
     * Die Datenbanktabelle des Models.
     *
     * @var string
     */
    protected $table = 'videos';

    /**
     * Die veränderbaren Tabellenspalten.
     *
     * @var array
     */
    protected $fillable = ['videoname','section','author','online','sequence_id','sequence_name','available_from','available_to'];

    /**
     * Hauptschlüssel festlegen um die ORM Suche zu vereinfachen.
     *
     * @var string
     */
    protected $primaryKey = 'videoname';

    /**
     * Hauptschlüssel als nicht numerisch definieren und automatisches Inkrementieren deaktivieren.
     *
     * @var boolean
     */
    public $incrementing = false;

    /**
     * Datenbankrelation Video hat viele Cuepoints.
     */
    public function cuepoints()
    {
        return $this->hasMany('Synthesise\Cuepoint', 'video_videoname');
    }

    /**
     * Datenbankrelation Video hat viele Papers.
     */
    public function papers()
    {
        return $this->hasMany('Synthesise\Paper', 'video_videoname');
    }

    /**
     * Datenbankrelation Video hat viele Notes.
     */
    public function notes()
    {
        return $this->hasMany('Synthesise\Note', 'video_videoname');
    }
}
