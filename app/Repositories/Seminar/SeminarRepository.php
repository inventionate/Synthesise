<?php namespace Synthesise\Repositories\Seminar;

use Illuminate\Database\Eloquent\Model;

use Synthesise\Seminar;
use Synthesise\Section;
use Synthesise\User;
use Auth;
use File;

/**
 * User Repository mit Queries und Logik.
 */
class SeminarRepository implements SeminarInterface
{

    /**
     * Get seminar.
     *
     * @param   string      $name
     *
     * @return  collection
     */
    public function get($name) {

        return Seminar::findOrFail($name);

    }

    /**
     * Store a new Seminar.
     *
     * @param     string    $title
     * @param     string    $author
     * @param     string    $contact
     * @param     string    $subject
     * @param     string    $module
     * @param     string    $description
     * @param     image     $image
     * @param     string    $info_intro;
     * @param     string    $info_lections;
     * @param     string    $info_texts;
     * @param     string    $info_exam;
     * @param     string    $info;
     * @param     date      $available_from
     * @param     date      $available_to
     * @param     array     $authorized_users
     * @param     string    $disqus_shortname
     *
     */
    public function store($title, $author, $contact, $subject, $module, $description, $image, $info_intro, $info_lections, $info_texts, $info_exam, $info, $available_from, $available_to, $authorized_users, $disqus_shortname)
    {

        // Save image.
        $image_saved = $image->move(storage_path('app/public/seminars'), md5_file($image) . '.' . $image->getClientOriginalExtension());

        $image_path = 'storage/seminars/' . $image_saved->getFilename();

        // Add root user.

        if( is_null($authorized_users) )
        {
            $authorized_users = ['root'];
        }
        else
        {
            $authorized_users[] = 'root';
        }

        // Save new seminar.

        $seminar = new Seminar;

        $seminar->name = $title;
        $seminar->author = $author;
        $seminar->contact = $contact;
        $seminar->subject = $subject;
        $seminar->module = $module;
        $seminar->description = $description;
        $seminar->image_path = $image_path;
        $seminar->info_intro = $info_intro;
        $seminar->info_lections = $info_lections;
        $seminar->info_texts = $info_texts;
        $seminar->info_exam = $info_exam;
        $seminar->info_path = $info;
        $seminar->available_from = date('Y-m-d', strtotime($available_from));
        $seminar->available_to = date('Y-m-d', strtotime($available_to));
        $seminar->authorized_editors = $authorized_users;

        // Check Disqus
        if( empty($disqus_shortname) )
        {
            $disqus_shortname = NULL;
        }

        $seminar->disqus_shortname = $disqus_shortname;

        $seminar->save();

    }

    /**
     * Update a Seminar.
     *
     * @param     string    $title
     * @param     string    $author
     * @param     string    $contact
     * @param     string    $subject
     * @param     string    $module
     * @param     string    $description
     * @param     image     $image
     * @param     string    $info_intro;
     * @param     string    $info_lections;
     * @param     string    $info_texts;
     * @param     string    $info_exam;
     * @param     string    $info;
     * @param     date      $available_from
     * @param     date      $available_to
     * @param     string    $disqus_shortname
     *
     */
    public function update($title, $author, $contact, $subject, $module, $description, $image, $info_intro, $info_lections, $info_texts, $info_exam, $info, $available_from, $available_to, $disqus_shortname)
    {

        // Find Seminar.
        $seminar = Seminar::findOrFail($title);

        // Update values.
        $seminar->author = $author;
        $seminar->contact = $contact;
        $seminar->subject = $subject;
        $seminar->module = $module;
        $seminar->description = $description;
        $seminar->info_intro = $info_intro;
        $seminar->info_lections = $info_lections;
        $seminar->info_texts = $info_texts;
        $seminar->info_exam = $info_exam;
        $seminar->available_from = date('Y-m-d', strtotime($available_from));
        $seminar->available_to = date('Y-m-d', strtotime($available_to));

        // Check Disqus
        if( empty($disqus_shortname) )
        {
            $disqus_shortname = NULL;
        }

        $seminar->disqus_shortname = $disqus_shortname;

        // Check new image.
        if( $image !== null )
        {
            // Remove old image.
            if ( Seminar::where('image_path', $seminar->image_path)->count() === 1 )
            {
                // @TODO: Sobald Laravel 5.3 verwendet werden kann, alles auf Storage umstellen! Hierzu kann ein symbolischer Link erstellt werden: 'php artisan storage:link'
                File::delete( $seminar->image_path );
            }

            // Save new image.
            $image_saved = $image->move(storage_path('app/public/seminars'), md5_file($image) . '.' . $image->getClientOriginalExtension());

            $image_path = 'storage/seminars/' . $image_saved->getFilename();

            $seminar->image_path = $image_path;
        }

        // Check new image.
        if( $info !== null )
        {
            // Remove old info.
            if ( Seminar::where('info_path', $seminar->info_path)->count() === 1 )
            {
                // @TODO: Sobald Laravel 5.3 verwendet werden kann, alles auf Storage umstellen! Hierzu kann ein symbolischer Link erstellt werden: 'php artisan storage:link'
                File::delete( $seminar->info_path );
            }

            // Save new info.
            $info_saved = $info->move(storage_path('app/public/seminars'), md5_file($info) . '.' . $info->getClientOriginalExtension());

            // @TODO Das geht mit der Laravel 5.3 Storage Facade einfacher!
            $info_path = 'storage/seminars/' . $info_saved->getFilename();

            $seminar->info_path = $info_path;
        }

        // Save updated Seminar.
        $seminar->save();

    }

    /**
     * Delete seminar.
     *
     * @param   string  $name
     */
    public function delete($name) {

        $seminar = Seminar::findOrFail($name);

        // Remove image.
        if ( Seminar::where('image_path', $seminar->image_path)->count() === 1 && $seminar->image_path !== null )
        {
            // @TODO: Sobald Laravel 5.3 verwendet werden kann, alles auf Storage umstellen! Hierzu kann ein symbolischer Link erstellt werden: 'php artisan storage:link'
            File::delete( $seminar->image_path );
        }

        // Remove info.
        if ( Seminar::where('info_path', $seminar->info_path)->count() === 1 && $seminar->info_path !== null )
        {
            // @TODO: Sobald Laravel 5.3 verwendet werden kann, alles auf Storage umstellen! Hierzu kann ein symbolischer Link erstellt werden: 'php artisan storage:link'
            File::delete( $seminar->info_path );
        }

        $users = $seminar->users()->withCount('seminars')->get();

        // Detach seminar.
        $seminar->users()->detach();

        // Delete seminar.
        $seminar->delete();

        // Delete users
        foreach ( $users as $user )
        {
            // If only one relation and not admin delete user.
            if( $user->seminars_count === 1 && $user->role !== 'Admin')
            {
                User::findOrFail($user->user_id)->delete();
            }
        }

    }

    /**
     * Delete seminars info document.
     *
     * @param   string  $name
     */
    public function deleteDocument($name) {

        $seminar = Seminar::findOrFail($name);

        // Remove info.
        if ( Seminar::where('info_path', $seminar->info_path)->count() === 1 && $seminar->info_path !== null )
        {
            // @TODO: Sobald Laravel 5.3 verwendet werden kann, alles auf Storage umstellen! Hierzu kann ein symbolischer Link erstellt werden: 'php artisan storage:link'
            File::delete( $seminar->info_path );
        }


        // Delete seminar.
        $seminar->info_path = NULL;

        $seminar->save();

    }

    /**
     * Retrieve all seminars including related user amount.
     *
     * @return    collection    All seminars.
     *
     */
    public function getAllWithUserCount() {

        return Auth::user()->seminars()->withCount('users')->get();
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

            $lections->push(   Section::find($section->id)->lections()->get() );
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

            return ($lection->pivot->available_from <= date('Y-m-d') && $lection->pivot->available_to >= date('Y-m-d'));

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

        if ( is_null($current_lection) )
        {
            $current_paper = null;
        }
        else
        {
            $current_paper = $current_lection->paper()->first();
        }

        return $current_paper;
    }

    /* Get all seminar users by role.
     *
     * @param     string    $name
     * @param     string    $role
     *
     * @return    collection
     */
    public function getAllUsersByRole($name, $role)
    {
        $users = Seminar::findOrFail($name)->users()->get()->where('role', $role);

        return $users;
    }

    /* Get seminar feedback mail.
     *
     * @param     string    $name
     *
     * @return    string
     */
    public function getFeedbackMail($name)
    {
        return Seminar::findOrFail($name)->contact;
    }

    /* Get seminar author.
     *
     * @param     string    $name
     *
     * @return    string
     */
    public function getAuthor($name)
    {
        return Seminar::findOrFail($name)->author;
    }

    /* Get seminar lection authors.
     *
     * @param     string    $name
     *
     * @return    array
     */
    public function getAllLectionAuthors($name) {

        $lections = $this->getAllLections($name);

        $lection_authors = $lections->pluck('author', 'contact')->all();

        return $lection_authors;

    }

    /* Get seminar Disqus shortname.
     *
     * @param     string    $name
     *
     * @return    string
     */
    public function getDisqusShortname($name) {

        return Seminar::findOrFail($name)->disqus_shortname;

    }

    /* Get all seminar infoblocks.
     *
     * @param     string    $name
     *
     * @return    collection
     */
    public function getAllInfoblocks($name) {

        return Seminar::findOrFail($name)->infoblocks()->get();

    }

    /* Get all seminar teachers.
     *
     * @param     string    $name
     * @param     string    $role
     *
     * @return    collection
     */
    public function getAllUsers($name, $role) {

        return Seminar::findOrFail($name)->users()->where('role', $role)->get();

    }

    /* Set user as authorized Editor.
     *
     * @param     string    $name
     * @param     string    $username
     *
     */
    public function setAuthorizedEditor($name, $username) {

        $seminar = Seminar::findOrFail($name);

        $authorized_editors = $seminar->authorized_editors;

        $authorized_editors[] = $username;

        $seminar->authorized_editors = $authorized_editors;

        $seminar->save();

    }


    /* Delete user as authorized Editor.
     *
     * @param     string    $name
     * @param     string    $username
     *
     */
    public function deleteAuthorizedEditor($name, $username) {


        $seminar = Seminar::findOrFail($name);

        $authorized_editors = $seminar->authorized_editors;

        $authorized_editors = array_diff($authorized_editors, [$username]);

        $seminar->authorized_editors = $authorized_editors;

        $seminar->save();

    }

}
