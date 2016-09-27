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

    /**
     * Get the current online-lection.
     *
     * @return    array Current lection.
     */
    public function getCurrentLection($name)
    {
        $video = DB::table('videos')->where('available_from', '<=', date('Y-m-d'))->orderBy('available_from', 'desc')->first();

        if (empty($video)) {
            return false;
        } else {
            return $video;
        }

        if(Seminar::getCurrentVideo() != false) {
            $videoname = Video::getCurrentVideo()->videoname;
            $author = Video::getCurrentVideo()->author;
            $available = true;
            $papers = Video::getPapers($videoname);
        }
        else {
            $videoname = 'Kein Video verfügbar.';
            $author = '';
            $available = false;
            $papers = null;
        }

    }

    /**
     * Gibt alle Videos zurück.
     *
     * @return    array Alle Videos.
     *
     * @todo 			Verallgemeinern, da auf 11 Videos zugeschnitten. Statt ->take(11) eher ->all().
     */
    public function getAllLections($name)
    {
        // return Lection::all()->take(11);
    }

    /**
     * Gibt alle Messages nach ihrem Aktualisierungsdatum sortiert zurück.
     *
     * @return 		array Alle Message-Einträgen.
     */
    public function getAllMessages($name)
    {
        return Seminar::find($name)->messages()->get()->sortBy('updated_at');
    }

    /**
     * Gibt die zu einem Video zugehörigen Papers aus.
     *
     * @param     string $videoname
     *
     * @return    array
     */
    // public function getPapers($videoname)
    // {
    //     return Lection::findOrFail($videoname)->papers;
    // }

}
