<?php namespace Synthesise\Repositories\Seminar;

use Illuminate\Database\Eloquent\Model;

use Synthesise\Seminar;
use Synthesise\Section;
use Synthesise\Lection;
use Auth;

/**
 * User Repository mit Queries und Logik.
 */
class SeminarRepository implements SeminarInterface
{

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
     *
     */
    public function store($title, $author, $subject, $module, $description, $image, $available_from, $available_to, $authorized_users)
    {

        // Save image.

        $image_saved = $image->move(public_path('img/seminars/'), md5_file($image) . '.' . $image->getClientOriginalExtension());

        $image_path = 'img/seminars/' . $image_saved->getFilename();

        // Add root user.

        array_push($authorized_users, 'root');

        // Save new seminar.

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
     * Retrieve all authorized editors for one seminar.
     *
     * @param   string      $name
     *
     * @return  collection  All seminars.
     *
     */
    public function getAuthorizedEditors($name) {

        return $users = Seminar::findOrFail($name)->authorized_editors;

    }

    /**
     * Check if the authenticated user is authorized.
     *
     * @param   string      $name
     *
     * @return  boolean     Authorized or not.
     *
     */
    public function authorizedEditor($name) {

        $authorized_editors = $this->getAuthorizedEditors($name);

        return in_array( Auth::user()->username, $authorized_editors );

    }

    /**
     * Check if the authenticated user is authorized mentor.
     *
     * @param   string      $name
     *
     * @return  boolean     Authorized or not.
     *
     */
    public function authorizedMentor($name) {

        return Auth::user()->role === 'Mentor';

    }

    /**
     * Get all sections.
     *
     * @param   string      $name
     *
     * @return  collection  All seminar lections.
     */
    public function getAllSections($name)
    {

        $sections = Seminar::find($name)->sections()->get();

        return $sections;

    }

    /**
     * Get all online-lections.
     *
     * @param   string      $name
     *
     * @return  collection  All seminar lections.
     */
    public function getAllLections($name)
    {

        $sections = $this->getAllSections($name);

        $lections = collect();

        foreach ( $sections as $section) {
            $lections->push(   Section::find($section->name)->lections()->get() );
        }

        return $lections->flatten();
    }

    /**
     * Get the current online-lection.
     *
     * @param   string      $name
     *
     * @return  collection  Current seminar lection.
     */
    public function getCurrentLection($name)
    {

        $lections = $this->getAllLections($name);

        $current_lection = $lections->filter(function ($lection) {

            return ($lection->available_from <= date('Y-m-d') && $lection->available_to >= date('Y-m-d'));

        })->sortByDesc('available_from')->first();

        return $current_lection;

    }

    /**
     * Gibt alle Messages nach ihrem Aktualisierungsdatum sortiert zurück.
     *
     * @return 		collection Alle Message-Einträgen.
     */
    public function getAllMessages($name)
    {
        return Seminar::find($name)->messages()->get()->sortBy('updated_at');
    }

    /**
     * Get current paper.
     *
     * @param     string $name
     *
     * @return    array
     */
    public function getCurrentPaper($name)
    {

        $current_lection = $this->getCurrentLection($name);

        $current_paper = $current_lection->paper()->first();

        return $current_paper;
    }

}
