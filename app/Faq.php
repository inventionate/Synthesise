<?php

namespace Synthesise;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    /**
     * Die Datenbanktabelle des Models.
     *
     * @var string
     */
    protected $table = 'faqs';

    /**
     * Die veränderbaren Tabellenspalten.
     *
     * @var array
     */
    protected $fillable = ['area','subject','question','answer'];
}
