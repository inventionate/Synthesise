<?php

namespace Synthesise\Repositories\Paper;

/**
 * Ein Interface für Seminar.
 */
interface PaperInterface
{

  public function store($text, $name, $author, $lection_name);

  public function update($text, $name, $author, $lection_name);

}
