<?php

namespace Synthesise\Repositories\Paper;

use Illuminate\Database\Eloquent\Model;

use Synthesise\Paper;

/**
 * User Repository mit Queries und Logik.
 */
class PaperRepository implements PaperInterface
{

  public function get($id) {
      return "Hello!";
  }

}
