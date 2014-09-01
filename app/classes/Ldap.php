<?php 

class Ldap 
{
	
	public static function authenticate($username, $password, $domain = '193.197.136.102', $baseDn = 'dc=ka,dc=ph-bw,dc=net')
	{
		/**
		* LDAP Verbindung aufbauen
		* Gibt wahr oder falsch zurück
		* @todo try-catch Block einbauen?
		*/
		
		// Verbindung zum LDAP Server aufbauen
		// Der @ Operator setzt die Variable auf 'undefined' wenn sie nicht erzeugt werden kann
		$ds = ldap_connect($domain);
		// Nutzer suchen
		$r = ldap_search( $ds, $baseDn, 'uid=' . $username);
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