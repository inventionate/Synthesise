<?php

namespace Synthesise\Repositories\Seminar;

/**
 * Ein Interface für Seminar.
 */
interface SeminarInterface
{
    public function get($name);

    public function store($title, $author, $contact, $subject, $module, $description, $image, $info_intro, $info_lections, $info_texts, $info_exam, $info_dates, $info_path, $available_from, $available_to, $authorized_users, $disqus_shortname);

    public function update($title, $author, $contact, $subject, $module, $description, $image, $info_intro, $info_lections, $info_texts, $info_exam, $info_dates, $info_path, $available_from, $available_to, $disqus_shortname);

    public function delete($name);

    public function deleteDocument($name);

    public function getAllWithUserCount();

    public function getAuthorizedEditors($name);

    public function authorizedEditor($name);

    public function authorizedMentor($name);

    public function authorizedTeacher($name);

    public function setAuthorizedEditor($name, $username);

    public function deleteAuthorizedEditor($name, $username);

    public function getCurrentLection($name);

    public function getAllSections($name);

    public function getAllLections($name);

    public function getAllMessages($name);

    public function getCurrentPaper($name);

    public function getAllUsersByRole($name, $role);

    public function getAllVerifiedUsersCount($name);

    public function getFeedbackMail($name);

    public function getAuthor($name);

    public function getAllLectionAuthors($name);

    public function getDisqusShortname($name);

    public function getAllInfoblocks($name);

    public function getAllUsers($name);

    public function getAllTitles();

    public function available($name);
}
