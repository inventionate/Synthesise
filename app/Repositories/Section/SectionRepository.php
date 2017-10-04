<?php

namespace Synthesise\Repositories\Section;

use Illuminate\Database\Eloquent\Model;

use Synthesise\Section;
use Storage;

/**
 * User Repository mit Queries und Logik.
 */
class SectionRepository implements SectionInterface
{
    /**
     * Get all lections of a section.
     *
     * @param     int   $id
     *
     * @return    array
     */
    public function getAllLections($id)
    {
        return Section::findOrFail($id)->lections()->orderBy('available_from')->get();
    }

    /**
     * Get section authors.
     *
     * @param     int    $id
     *
     * @return    array
     */
    public function getAllAuthors($id) {

        $lections = $this->getAllLections($id);

        $authors = $lections->pluck('author')->unique()->all();

        return $authors;

    }

    /**
     * Store new section.
     *
     * @param     string    $name
     * @param     string    $seminar_name
     * @param     string    $further_reading
     *
     */
    public function store($name, $seminar_name, $further_reading_path)
    {
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
     * @param     string    $further_reading
     *
     */
    public function update($id, $name, $seminar_name, $further_reading_path)
    {
        // Find section.
        $section = Section::findOrFail($id);

        // Check new image.
        if( $further_reading_path !== null )
        {
            // Remove old image.
            if ( Section::where('further_reading_path', $section->further_reading_path)->count() === 1 )
            {
                Storage::delete( $section->further_reading_path );
            }

            // Save further_reading.
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
            Storage::delete( $section->further_reading_path );
        }

        // Detach all lections.
        $section->lections()->detach();

        // Delete.
        $section->delete();
    }

}
