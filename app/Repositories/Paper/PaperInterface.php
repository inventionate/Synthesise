<?php

namespace Synthesise\Repositories\Paper;

/**
 * Ein Interface für Seminar.
 */
interface PaperInterface
{

  public function store($name, $author, $path, $lection_name);

}
