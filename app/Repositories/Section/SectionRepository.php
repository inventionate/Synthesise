<?php

namespace Synthesise\Repositories\Section;

use Illuminate\Database\Eloquent\Model;

use Synthesise\Section;
use File;

/**
 * User Repository mit Queries und Logik.
 */
class SectionRepository implements SectionInterface
{
    /**
     * Get all lections of a section.
     *
     * @param     string $name
     *
     * @return    array
     */
    public function getAllLections($name)
    {
        return Section::findOrFail($name)->lections()->orderBy('available_from')->get();
    }

    /* Get section authors.
     *
     * @param     string    $name
     *
     * @return    array
     */
    public function getAllAuthors($name) {

        $lections = $this->getAllLections($name);

        $authors = $lections->pluck('author')->unique()->all();

        return $authors;

    }

    /**
     * Store new section.
     *
     * @param     string    $name
     * @param     string    $seminar_name
     * @param     file      $further_reading
     *
     */
    public function store($name, $seminar_name, $further_reading)
    {
        // Save further_reading.
        $further_reading_saved = $further_reading->move(storage_path('app/public/sections'), md5_file($further_reading) . '.' . $further_reading->getClientOriginalExtension());

        $further_reading_path = 'storage/sections/' . $further_reading_saved->getFilename();

        // Save new seminar.

        $section = new Section;

        $section->name = $name;
        $section->seminar_name = $seminar_name;
        $section->further_reading_path = $further_reading_path;

        $section->save();
    }

    /**
     * Store new section.
     *
     * @param     string    $name
     * @param     string    $seminar_name
     * @param     file      $further_reading
     *
     */
    public function update($id, $name, $seminar_name, $further_reading)
    {
        // Find section.
        $section = Section::findOrFail($id);

        // Check new image.
        if( $further_reading !== null )
        {
            // Remove old image.
            if ( Seminar::where('further_reading_path', $section->further_reading_path)->count() === 1 )
            {
                // @TODO: Sobald Laravel 5.3 verwendet werden kann, alles auf Storage umstellen! Hierzu kann ein symbolischer Link erstellt werden: 'php artisan storage:link'
                File::delete( $section->further_reading_path );
            }

            // Save further_reading.
            $further_reading_saved = $further_reading->move(storage_path('app/public/sections'), md5_file($further_reading) . '.' . $further_reading->getClientOriginalExtension());

            $further_reading_path = 'storage/sections/' . $further_reading_saved->getFilename();

            $section->further_reading_path = $further_reading_path;
        }

        $section->name = $name;
        $section->seminar_name = $seminar_name;

        $section->save();
    }


    /**
     * Store new section.
     *
     * @param     int   $id
     *
     */
    public function delete($id)
    {

        $section = Section::findOrFail($id);

        if ( Section::where('further_reading_path', $section->further_reading_path)->count() === 1 && $section->further_reading_path !== null )
        {
            // @TODO: Sobald Laravel 5.3 verwendet werden kann, alles auf Storage umstellen! Hierzu kann ein symbolischer Link erstellt werden: 'php artisan storage:link'
            File::delete( $section->further_reading_path );
        }

        // Detach all lections.
        $section->lections()->detach();

        // Delete.
        $section->delete();
    }

}
