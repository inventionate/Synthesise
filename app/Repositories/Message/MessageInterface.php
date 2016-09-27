<?php

namespace Synthesise\Repositories\Message;

/**
 * Ein Interface für Message.
 */
interface MessageInterface
{

    public function store($seminar_name, $title, $content, $colour);

    public function update($id, $newTitle, $newContent, $newColour);

    public function delete($id);

}
