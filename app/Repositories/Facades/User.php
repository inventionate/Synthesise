<?php namespace Synthesise\Repositories\Facades;

use Illuminate\Support\Facades\Facade;

class User extends Facade {

  protected static function getFacadeAccessor() { return 'user'; }

}
