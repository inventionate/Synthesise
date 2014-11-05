<?php
use \UnitTester;

use Synthesise\Extensions\Ldap;

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

    $ldap = new Ldap('193.197.136.102','dc=ka,dc=ph-bw,dc=net');

    $authSuccess = $ldap->authenticate($username, $password);

    $I->assertFalse($authSuccess);
  }

}
