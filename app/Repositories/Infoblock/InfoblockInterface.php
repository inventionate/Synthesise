<?php

namespace Synthesise\Repositories\Infoblock;

/**
 * Ein Interface für Lection.
 */
interface InfoblockInterface
{
    public function store($name, $content, $link_url, $image, $seminar_name);

    public function update($id, $name, $content, $link_url, $image, $seminar_name);

    public function delete($id);

}
