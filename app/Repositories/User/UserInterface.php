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

  public function store($username, $role);

  public function destroy($id);

  public function destroyMany($ids);

  public function destroyAll($role, $except_ids);
}
