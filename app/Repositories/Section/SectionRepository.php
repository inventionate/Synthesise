<?php

namespace Synthesise\Repositories\Section;

use Illuminate\Database\Eloquent\Model;

use Synthesise\Section;

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
        return Section::findOrFail($name)->lections()->get();
    }

}
