<?php namespace Synthesise\Extensions;

class Ldap {

	protected $domain;

	protected $baseDn;

	public function __construct($domain, $baseDn)
	{
		$this->domain = $domain;
		$this->baseDn = $baseDn;
	}

	/**
	 * LDAP Authentifizierung
	 *
	 */
	public function authenticate($username, $password)
	{
		/**
		* LDAP Verbindung aufbauen
		* Gibt wahr oder falsch zurück
		* @todo try-catch Block einbauen?
		*/

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
					return true;
				}
				else
				{
					return false;
				}
			}
		}
	}
}
