<?php

namespace Synthesise\Repositories\Sequence;

use Illuminate\Database\Eloquent\Model;

use Synthesise\Sequence;

/**
 * User Repository mit Queries und Logik.
 */
class SequenceRepository implements SequenceInterface
{

  public function get($id) {
      return "Hello!";
  }

}
