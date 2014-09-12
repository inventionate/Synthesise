<?php namespace Synthesise\Repositories\Note;

/**
 * Ein Interface für Note.
 */
interface NoteInterface
{
  public function getNoteId($userId, $cuepointId);

  public function getContent($userId, $cuepointId);

  public function updateContent($noteContent, $userId, $cuepointId, $videoname);
}
