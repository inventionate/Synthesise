<?php namespace Synthesise\Repositories\Seminar;

use Illuminate\Database\Eloquent\Model;

use Synthesise\Seminar;

/**
 * User Repository mit Queries und Logik.
 */
class SeminarRepository implements SeminarInterface
{

  public function get($id) {
      return "Hello!";
  }

}
