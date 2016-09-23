<?php namespace Synthesise\Repositories\Seminar;

use Illuminate\Database\Eloquent\Model;

use Synthesise\Seminar;

/**
 * User Repository mit Queries und Logik.
 */
class SeminarRepository implements SeminarInterface
{

    /**
     * Retrieve all seminars including related user amount.
     *
     * @return    collection    All seminars.
     *
     */
    public function getAllWithUserCount() {

        return Seminar::withCount('users')->get();
    }

}
