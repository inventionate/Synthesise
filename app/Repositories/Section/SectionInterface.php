<?php

namespace Synthesise\Repositories\Section;

/**
 * Ein Interface für Section.
 */
interface SectionInterface
{

  public function getAllLections($name);

  public function store($name, $seminar_name, $further_reading);

  public function update($id, $name, $seminar_name, $further_reading);

  public function delete($id);

}
