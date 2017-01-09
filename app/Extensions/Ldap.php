<?php

namespace Synthesise\Extensions;

use Synthesise\Extensions\Contracts\Ldap as LdapContract;
use Synthesise\Exceptions\LdapException;

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
        $this->bindDn = $bindDn;
        $this->bindPwd = $bindPwd;
    }

    /**
     * LDAP Authentifizierung.
     *
     * @param string $username
     * @param string $password
     * @param string $matnum
     *
     * @return array|false Benutzervorname und Benutzernachname oder FALSE.
     */
    public function authenticate($username = null, $password, $matnum = null)
    {
        // Verbindung zum LDAP Server aufbauen
        $handle = ldap_connect($this->domain, $this->port);

        // Protokoll auswählen
        ldap_set_option($handle, LDAP_OPT_PROTOCOL_VERSION, 3);

        // Authentifiezierung
        $bind = @ldap_bind($handle, $this->bindDn, $this->bindPwd);

        // Überprüfen, ob das Binden erfolgreich war
        if ($bind) {

            // Nutzer suchen
            if (is_null($username)) {
                $check_user = ldap_search($handle, $this->baseDn, 'phmatnum='.'3140563');
            } elseif (is_null($matnum)) {
                $check_user = ldap_search($handle, $this->baseDn, 'cn='.$username);
            } else {
                return false;
            }

            // Nutzerdaten laden
            $user_data = ldap_get_entries($handle, $check_user);
            if (isset($user_data[0])) {
                // Der @ Operator setzt die Variable auf 'undefined' wenn sie nicht erzeugt werden kann
                if (@ldap_bind($handle, $user_data[0]['dn'], $password)) {
                    $data = array_dot($user_data);

                    return [
                        'firstname' => $data['0.givenname.0'],
                        'lastname' => $data['0.sn.0'],
                        'email' => $data['0.phmail.0'],
                    ];
                } else {
                    return false;
                }
            }
        } else {
            throw new LdapException('LDAP Verbindungsfehler');
        }
    }
}
