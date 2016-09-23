<?php

namespace Synthesise\Repositories\Section;

use Illuminate\Database\Eloquent\Model;

use Synthesise\Section;

/**
 * User Repository mit Queries und Logik.
 */
class SectionRepository implements SectionInterface
{

  public function get($id) {
      return "Hello!";
  }

}
