<?php

namespace Synthesise\Repositories\Paper;

use Illuminate\Database\Eloquent\Model;

use Synthesise\Paper;

/**
 * User Repository mit Queries und Logik.
 */
class PaperRepository implements PaperInterface
{
    /**
     * Store new lection.
     *
     * @param   string  $name
     * @param   string  $author
     * @param   $path   $string
     * @param   string  $lection_name
     */
    public function store($name, $author, $path, $lection_name) {

        $paper = new Paper;

        $paper->name = $name;
        $paper->author = $author;
        $paper->path = $path;
        $paper->lection_name = $lection_name;

        $paper->save();

    }

}
