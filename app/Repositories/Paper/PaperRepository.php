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
     * @param   file    $text
     * @param   string  $name
     * @param   string  $author
     * @param   string  $lection_name
     */
    public function store($text, $name, $author, $lection_name) {

        // Save text.
        $text_saved = $text->move(storage_path('app/public/papers'), md5_file($text) . '.' . $text->getClientOriginalExtension());

        $text_path = 'storage/papers/' . $text_saved->getFilename();

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
     * @param   file    $text
     * @param   string  $name
     * @param   string  $author
     * @param   string  $lection_name
     */
    public function update($text, $name, $author, $lection_name) {

        // Find paper.

        $paper = Paper::findOrFail($name);

        // Check new text.
        if( $text !== null )
        {
            // Remove old image.
            if ( Paper::where('path', $paper->path)->count() === 1 )
            {
                // @TODO: Sobald Laravel 5.3 verwendet werden kann, alles auf Storage umstellen! Hierzu kann ein symbolischer Link erstellt werden: 'php artisan storage:link'
                File::delete( $paper->path );
            }

            $text_saved = $text->move(storage_path('app/public/papers'), md5_file($text) . '.' . $text->getClientOriginalExtension());

            $text_path = 'storage/papers/' . $text_saved->getFilename();

            $text->path = $text_path;
        }

        $paper->name = $name;
        $paper->author = $author;
        $paper->lection_name = $lection_name;

        $paper->save();

    }

}
