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
    protected $fillable = ['cuepoint','video_videoname','content', 'video_sequence_id'];

    /**
     * Datenbankrelation Cuepoint – Note.
     */
    public function notes()
    {
        return $this->hasMany('Note');
    }

    /**
     * Datenbankrelation Cuepoint – Video.
     */
    public function video()
    {
        return $this->belongsTo('Video', 'video_videoname');
    }
}
