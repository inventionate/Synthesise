<?php
use \UnitTester;

class LdapCest
{

    /**
     * Testet, ob die LDAP Authentifizierung funktioniert.
     *
     */
    public function testAuthenticateUsingLdap(UnitTester $I)
    {
        $I->wantTo('authenticate User against LDAP server');

        $username = 'studtesttestka';
        $password = 'Test';

        $authSuccess = LDAP::authenticate($username, $password);

        $I->assertFalse($authSuccess);
    }

}
