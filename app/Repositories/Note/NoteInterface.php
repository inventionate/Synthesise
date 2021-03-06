<?php namespace Synthesise\Repositories\Note;

/**
 * Ein Interface für Note.
 */
interface NoteInterface
{
    public function get($user_id, $cuepoint_id, $lection_name, $seminar_name, $sequence);

    public function store($user_id, $cuepoint_id, $lection_name, $seminar_name, $note_content, $sequence);

    public function update($user_id, $cuepoint_id, $lection_name, $seminar_name, $note_content, $sequence);

    public function delete($user_id, $cuepoint_id, $lection_name, $seminar_name, $sequence);
}
