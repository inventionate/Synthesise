<?php

namespace Synthesise;

use Illuminate\Database\Eloquent\Model;

class Sequence extends Model
{
    /**
     * Die Datenbanktabelle des Models.
     *
     * @var string
     */
    protected $table = 'sequences';

    /**
     * Die veränderbaren Tabellenspalten.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'video',
        'path',
        'lection_name'
    ];

    /**
     * Datenbankrelation Sequence hat viele Cuepoints.
     */
    public function cuepoints()
    {
        return $this->hasMany('Synthesise\Cuepoint', 'sequence_id');
    }

    /**
     * Datenbankrelation Sequence gehört zu Lection.
     */
    public function lection()
    {
        return $this->belongsTo('Synthesise\Lection', 'lection_name');
    }

}
