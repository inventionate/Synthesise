<?php

namespace Synthesise\Repositories\Lection;

/**
 * Ein Interface für Lection.
 */
interface LectionInterface
{

    public function attachToSection($section_id, $name);

    public function detachFromSection($section_id, $name);

    public function store($name, $section_id, $author, $contact, $text, $text_name, $text_author, $image, $available_from, $available_to, $authorized_users, $seminar_name);

    public function update($name, $section_id, $author, $contact, $text, $text_name, $text_author, $image, $available_from, $available_to, $authorized_users, $seminar_name);

    public function getAll();

    public function available($videoname);

    public function getSection($videoname);

    public function unlockDate($videoname);

    public function finalDate($videoname);

    public function getOnline($videoname);

    public function getCurrentVideo();

    public function getVideos();

    public function getPaper($videoname);

    public function getFlagnames($videoname, $seqenceNumber);

    public function getCuepoints($videoname, $seqenceNumber);

    public function getFirstCuepointId($videoname, $seqenceNumber);

    public function getAllFlagnamesAsHTML($videoname, $seqenceNumber);

    public function getSequences($videoname);
}
