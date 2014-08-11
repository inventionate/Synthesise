<?php
use \UnitTester;

class UserCest
{
    
    /**
     * Testnutzer definieren
     * 
     * @author Fabian Mundt <f.mundt@ph-karlsruhe.de>
     */
    protected $testuser1 = array(
                                'username' => 'vturner',
                                'password' => 'Betwixt',
                                'firstname' => 'Victor',
                                'lastname' => 'Turner',
                                'role' => 'Student',
                                'created_at' => '2014-09-17 17:00:00',
                                'updated_at' => '2014-09-17 17:00:00',
                                'permissions' => 'none',
                                'remember_token' => ''
                                );
    
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
    
        $I->haveRecord('users', $this->testuser1);
        
        $user = User::findByUsername('vturner');
        
        $I->AssertEquals($user->firstname,'Victor');
    }
    
}