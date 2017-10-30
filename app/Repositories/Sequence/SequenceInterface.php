<?php

namespace Synthesise\Repositories\Sequence;

/**
 * Ein Interface für Seminar.
 */
interface SequenceInterface
{

    public function getHelpPoints($id);

    public function updateHelpPoints($id, $help_points);

    public function deleteHelpPoints($id);

}
