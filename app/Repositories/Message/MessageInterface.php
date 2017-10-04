<?php

namespace Synthesise\Repositories\Message;

/**
 * Ein Interface für Message.
 */
interface MessageInterface
{

    public function store($seminar_name, $title, $content, $colour, $file_path);

    public function update($id, $title, $content, $colour, $file_path);

    public function delete($id);

}
