<?php
use \FunctionalTester;

class LoginCest
{
    
    /**
     * Bereitet die virtuelle Datenbank und virtuelle E-Mails vor
     * 
     * Migriert alle Strukturen in eine virtuelle SQLite Datenbank (:memory:)
     * und setzt die E-Mail auf 'pretend' um sie in der Logfile zu verzeichnen.
     *
     * @author Fabian Mundt <f.mundt@ph-karlsruhe.de>
     */
    public function _before()
    {
        TestCommons::prepareLaravel();
    }
    
    /**
    * Testet ob nur vorhandene Nutzer sich anmelden können
    * 
    * @author Fabian Mundt <f.mundt@ph-karlsruhe.de>
    */
    public function testLoginError(FunctionalTester $I) 
    {
        $I->am('Student');
        $I->wantTo('get an username not existing error');
    
        $I->dontSeeRecord('users', ['username' => 'Luke']);
    
        $I->amOnPage('/login');
        $I->see('Login','h1');
        $I->fillField('#username','luke');
        $I->fillField('#password','pw');
        $I->click('Anmelden','#login');
        
        $I->seeCurrentUrlEquals('/login');
        $I->see('Ihre Zugangsdaten waren nicht korrekt.','div');	
    }
    
    /**
    * Testet ob sich Nutzer anmelden können, die keinen LDAP Account haben
    * 
    * @author Fabian Mundt <f.mundt@ph-karlsruhe.de>
    */
    public function testNonLdapLogin(FunctionalTester $I) 
    {
        
        $I->am('Student');
        $I->wantTo('login without ldap credentials');
    
        $I->seeRecord('users', ['username' => 'Zelda']);
    
        $I->amOnPage('/login');
        $I->see('Login','h1');
        $I->fillField('#username','Zelda');
        $I->fillField('#password','Hyrule');
        $I->click('Anmelden','#login');
        
        $I->seeCurrentUrlEquals('/dashboard');
        $I->see('Dashboard','h1');   
        
    }

    
}