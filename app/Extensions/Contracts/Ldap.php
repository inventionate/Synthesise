<?php namespace Synthesise\Extensions\Contracts;

interface Ldap {
  /**
   * LDAP Authentifizierung.
   *
   * @param 		$username
   * @param 		$password
   * @return		array|false Benutzervorname und Benutzernachname oder FALSE.
   */
  function authenticate($username, $password);
}
