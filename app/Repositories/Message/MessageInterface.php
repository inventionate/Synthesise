<?php namespace Synthesise\Repositories\Message;

/**
 * Ein Interface für Message.
 */
interface MessageInterface
{
  public function getAll();

  public function update($id, $newMessage, $newType);

  public function delete($id);

  public function store($message, $type);

}
