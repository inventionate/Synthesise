<?php

namespace Synthesise\Repositories\Lection;

/**
 * Ein Interface für Lection.
 */
interface LectionInterface
{

    public function attachToSection($section_id, $name, $available_from, $available_to);

    public function detachFromSection($section_id, $name);

    public function store($name, $section_id, $author, $contact, $text, $text_name, $text_author, $image, $available_from, $available_to, $authorized_users, $seminar_name);

    public function update($name, $section_id, $old_section_id, $author, $contact, $text, $text_name, $text_author, $image, $available_from, $available_to, $authorized_users, $seminar_name);

    public function getAll();

    public function getAllNotAttached($seminar_name);

    public function get($name, $seminar_name);

    public function available($name, $seminar_name);

    public function getSection($name, $seminar_name);

    public function getSequenceCount($name);

    public function getSequenceCountSpelled($name);

    public function getSequences($name);

    public function getSequence($name, $sequence);

    public function getMarkers($name, $sequence);

    public function getImagePath($name);

    public function getPaper($name);

}
