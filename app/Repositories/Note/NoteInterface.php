<?php namespace Synthesise\Repositories\Note;

/**
 * Ein Interface für Note.
 */
interface NoteInterface
{
    public function get($user_id, $cuepoint_id, $lection_name, $seminar_name);

    public function store($user_id, $cuepoint_id, $lection_name, $seminar_name, $note_content);
}
