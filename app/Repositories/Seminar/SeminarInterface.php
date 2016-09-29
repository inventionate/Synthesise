<?php namespace Synthesise\Repositories\Seminar;

/**
 * Ein Interface für Seminar.
 */
interface SeminarInterface
{

    public function get($name);

    public function store($title, $author, $contact, $subject, $module, $description, $image, $available_from, $available_to, $authorized_users);

    public function update($title, $author, $contact, $subject, $module, $description, $image, $available_from, $available_to);

    public function delete($name);

    public function getAllWithUserCount();

    public function getAuthorizedEditors($name);

    public function authorizedEditor($name);

    public function authorizedMentor($name);

    public function getCurrentLection($name);

    public function getAllSections($name);

    public function getAllLections($name);

    public function getAllMessages($name);

    public function getCurrentPaper($name);

    public function getAllUsersByRole($name, $role);

    public function getFeedbackMail($name);

    public function getAuthor($name);

    public function getAllLectionAuthors($name);

}
