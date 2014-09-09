<?php
use \UnitTester;

class LdapCest
{

    /**
     * Testet, ob die LDAP Authentifizierung funktioniert.
     *
     */
    public function authenticateUsingLdap(UnitTester $I)
    {
        $username = 'studtesttestka';
        $password = 'Test';

        $authSuccess = LDAP::authenticate($username, $password);

        $I->assertFalse($authSuccess);
    }

}
