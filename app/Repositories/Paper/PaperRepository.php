<?php

namespace Synthesise\Repositories\Paper;

use Illuminate\Database\Eloquent\Model;

use Synthesise\Paper;
use Storage;

/**
 * User Repository mit Queries und Logik.
 */
class PaperRepository implements PaperInterface
{
    /**
     * Store new lection.
     *
     * @param   string  $text_path
     * @param   string  $name
     * @param   string  $author
     * @param   string  $lection_name
     */
    public function store($text_path, $name, $author, $lection_name) {

        $paper = new Paper;

        $paper->name = $name;
        $paper->author = $author;
        $paper->path = $text_path;
        $paper->lection_name = $lection_name;

        $paper->save();

    }

    /**
     * Store new lection.
     *
     * @param   string  $text_path
     * @param   string  $name
     * @param   string  $author
     * @param   string  $lection_name
     */
    public function update($text_path, $name, $author, $lection_name) {

        // Find paper.

        $paper = Paper::findOrFail($name);

        // Check new text.
        if( $text_path !== null )
        {
            // Remove old image.
            if ( Paper::where('path', $paper->path)->count() === 1 )
            {
                Storage::delete( $paper->path );
            }

            $paper->path = $text_path;

        }

        $paper->name = $name;
        $paper->author = $author;
        $paper->lection_name = $lection_name;

        $paper->save();

    }

}
