<?php namespace Synthesise\Extensions;

class Ldap {

	/**
	* LDAP server domain.
	*
	* @var string
	*/
	protected $domain;

	/**
	* LDAP base DN.
	*
	* @var string
	*/
	protected $baseDn;

	/**
	 * LDAP constructor
	 *
	 * @param     $domain
	 * @param 		$baseDn
	 */
	public function __construct($domain, $baseDn)
	{
		$this->domain = $domain;
		$this->baseDn = $baseDn;
	}

	/**
	 * LDAP Authentifizierung
	 *
	 * @param 		$username
	 * @param 		$password
	 * @return		array|false Benutzervorname und Benutzernachname oder FALSE.
	 */
	public function authenticate($username, $password)
	{
		// Verbindung zum LDAP Server aufbauen
		// Der @ Operator setzt die Variable auf 'undefined' wenn sie nicht erzeugt werden kann
		$ds = ldap_connect($this->domain);
		// Nutzer suchen
		$r = ldap_search( $ds, $this->baseDn, 'uid=' . $username);
		// Nur weiter fortfahren, wenn ein Nutzer gefunden wurde
		if ( isset($r) )
		{
			// Nutzerdaten laden
			$result = ldap_get_entries($ds, $r);
			if ( isset($result[0]) )
			{
				if( @ldap_bind( $ds, $result[0]['dn'], $password) )
				{
					$data = array_dot($result);
					return [
						'firstname' => $data['0.givenname.0'],
						'lastname' => $data['0.sn.0']
					];
				}
				else
				{
					return false;
				}
			}
		}
	}

}
