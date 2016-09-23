<?php

namespace Synthesise;

use Illuminate\Database\Eloquent\Model;

class Cuepoint extends Model
{
    /**
     * Die Datenbanktabelle des Models.
     *
     * @var string
     */
    protected $table = 'cuepoints';

    /**
     * Die veränderbaren Tabellenspalten.
     *
     * @var array
     */
    protected $fillable = ['cuepoint','content', 'sequence_id'];

    /**
     * Datenbankrelation Cuepoint – Note.
     */
    public function notes()
    {
        return $this->hasMany('Synthesise\Note', 'cuepoint_id');
    }

    /**
     * Datenbankrelation Cuepoint – Sequence.
     */
    public function sequence()
    {
        return $this->belongsTo('Seqence', 'sequence_id');
    }
}
