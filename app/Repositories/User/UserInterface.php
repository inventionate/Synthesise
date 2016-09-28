<?php namespace Synthesise\Repositories\User;

/**
 * Ein Interface für User.
 */
interface UserInterface
{
  public function getAllNotes($userId, $videoname);

  public function getUsername();

  public function getEmail();

  public function findByUsername($username, $columns = ['*']);

  public function getAll();

  public function getAllByRole($role);

  public function store($username, $role, $firstname, $lastname, $password, $seminar_names);

   public function update($id, $username, $role, $firstname, $lastname, $password);

  public function exportUsernamesOfFile($users);

  public function delete($id);

  public function deleteMany($ids, $seminar_names);

  public function deleteAll($role, $except_ids, $seminar_names);
}
