<?php

namespace Synthesise\Repositories\Video;

/**
 * Ein Interface für Video.
 */
interface VideoInterface
{
    public function available($videoname);

    public function getSection($videoname);

    public function unlockDate($videoname);

    public function finalDate($videoname);

    public function getOnline($videoname);

    public function getCurrentVideo();

    public function getVideos();

    public function getPapers($videoname);

    public function getFlagnames($videoname, $seqenceNumber);

    public function getCuepoints($videoname, $seqenceNumber);

    public function getFirstCuepointId($videoname, $seqenceNumber);

    public function getAllFlagnamesAsHTML($videoname, $seqenceNumber);

    public function getSequences($videoname);
}
