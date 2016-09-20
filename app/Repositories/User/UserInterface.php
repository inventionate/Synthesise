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
}
