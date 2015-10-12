<?php

namespace Synthesise\Extensions;

use Synthesise\Extensions\Contracts\Ldap as LdapContract;

class Ldap implements LdapContract
{
    /**
     * LDAP server domain.
     *
     * @var string
     */
    protected $domain;

    /**
     * LDAP port.
     *
     * @var string
     */
    protected $port;

    /**
     * LDAP base DN.
     *
     * @var string
     */
    protected $baseDn;

    /**
     * LDAP bind DN.
     *
     * @var string
     */
    protected $bindDn;

    /**
     * LDAP bind Password.
     *
     * @var string
     */
    protected $bindPwd;

    /**
     * LDAP constructor.
     *
     * @param 	$domain
     * @param 	$port
     * @param 	$baseDn
     * @param 	$bindDn
     * @param 	$bindPwd
     */
    public function __construct($domain, $port, $baseDn, $bindDn, $bindPwd)
    {
        $this->domain = $domain;
        $this->port = $port;
        $this->baseDn = $baseDn;
        $this->bindDn = $baseDn;
        $this->bindPwd = $baseDn;
    }

    /**
     * LDAP Authentifizierung.
     *
     * @param 	 $username
     * @param 	 $password
     *
     * @return array|false Benutzervorname und Benutzernachname oder FALSE.
     */
    public function authenticate($username, $password)
    {
        // Verbindung zum LDAP Server aufbauen
        // Der @ Operator setzt die Variable auf 'undefined' wenn sie nicht erzeugt werden kann
        $ds = ldap_connect($this->domain, $port);
        // Nutzer suchen
        $r = ldap_search($ds, $this->baseDn, 'uid='.$username);
        // Nur weiter fortfahren, wenn ein Nutzer gefunden wurde
        if (isset($r)) {
            // Nutzerdaten laden
            $result = ldap_get_entries($ds, $r);
            if (isset($result[0])) {
                if (@ldap_bind($ds, $result[0]['dn'], $password)) {
                    $data = array_dot($result);

                    return [
                        'firstname' => $data['0.givenname.0'],
                        'lastname' => $data['0.sn.0'],
                    ];
                } else {
                    return false;
                }
            }
        }
    }
}
