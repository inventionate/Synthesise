<?php

namespace Synthesise\Repositories\Sequence;

use Illuminate\Database\Eloquent\Model;

use Synthesise\Sequence;

/**
 * User Repository mit Queries und Logik.
 */
class SequenceRepository implements SequenceInterface
{
    /**
    * Get help points
    *
    * @param 		int     $id
    */
    public function getHelpPoints($id)
    {
        $sequence = Sequence::findOrFail($id);

        $help_points = $sequence->help_points;

        return $help_points;
    }

    /**
    * Update help points
    *
    * @param 		int     $id
    * @param 		int    $help_point
    */
    public function updateHelpPoints($id, $help_point)
    {
        $sequence = Sequence::findOrFail($id);

        $existing_help_points = json_decode($sequence->help_points, true);

        if ( is_null($existing_help_points) )
        {
            $sequence->help_points = json_encode([$help_point]);
        }
        else
        {
            $existing_help_points[] = $help_point;

            $sequence->help_points = json_encode($existing_help_points);
        }

        $sequence->save();
    }

    /**
    * Delete help points
    *
    * @param 		int     $id
    */
    public function deleteHelpPoints($id)
    {
        $sequence = Sequence::findOrFail($id);

        $sequence->help_points = NULL;

        $sequence->save();
    }
}
