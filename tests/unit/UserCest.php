<?php
use \UnitTester;

class UserCest
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
    * Testet ob ein User Objekt erzeugt werden kann.
    *
    * @author Fabian Mundt <f.mundt@ph-karlsruhe.de>
    */
    public function testCreateANewUser(UnitTester $I)
    {
        
        $I->wantTo('create a new user object');
        $I->canCreate('User');
                
    }
    
    /**
     * Testet das Suchen eines Nutzers anhand seines Nutzernamens
     * 
     * @author Fabian Mundt <f.mundt@ph-karlsruhe.de>
     */
    public function testFindUserByUsername(UnitTester $I)
    {
        $I->wantTo('find a user by username');
        
        $testuser = TestCommons::testuser();
        $testuser['username'] = 'otard';
        $testuser['firstname'] = 'Baron';
    
        $I->haveRecord('users', $testuser);
        
        $user = User::findByUsername('otard');
        
        $I->AssertEquals($user->firstname,'Baron');
    }
    
}