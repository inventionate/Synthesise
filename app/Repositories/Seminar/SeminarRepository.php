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

    /**
     * Store a new Seminar.
     *
     * @param     string    $title
     * @param     string    $author
     * @param     string    $subject
     * @param     string    $module
     * @param     string    $description
     * @param     image     $image
     * @param     date      $available_from
     * @param     date      $available_to
     * @param     array     $authorized_users
     */
    public function store($title, $author, $subject, $module, $description, $image, $available_from, $available_to, $authorized_users)
    {

        $image_saved = $image->move(public_path('img/seminars/'), md5_file($image) . '.' . $image->getClientOriginalExtension());

        $image_path = "img/seminars/" . $image_saved->getFilename();

        $seminar = new Seminar;

        $seminar->name = $title;
        $seminar->author = $author;
        $seminar->subject = $subject;
        $seminar->module = $module;
        $seminar->description = $description;
        $seminar->image_path = $image_path;
        $seminar->available_from = $available_from;
        $seminar->available_to = $available_to;
        $seminar->authorized_editors = $authorized_users;

        $seminar->save();

    }

}
