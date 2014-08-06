<?php
use \UnitTester;

class LdapCest
{
    
    /**
     * Testet, ob die LDAP Authentifizierung funktioniert.
     * @author Fabian Mundt <f.mundt@ph-karlsruhe.de>
     */
    public function authenticateUsingLdap(UnitTester $I)
    {
        $username = 'studtesttestka';
        $password = 'Test';
        
        $authSuccess = Ldap::authenticate($username, $password);
        
        $I->assertFalse($authSuccess);
    } 
    
}


