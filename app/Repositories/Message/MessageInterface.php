<?php namespace Synthesise\Repositories\Message;

/**
 * Ein Interface für Message.
 */
interface MessageInterface
{
  public function getAll();

  public function update($id, $newTitle, $newContent, $newColour);

  public function delete($id);

  public function store($id, $title, $content, $colour);

}
