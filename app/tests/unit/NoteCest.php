<?php
use \UnitTester;
use AspectMock\Test;

class NoteCest
{
    
    public function _before()
    {
        TestCommons::prepareLaravel();
    }
    
    public function _after()
    {
        Test::clean();
    }
    
    // tests
    public function tryToCreateANewNote(UnitTester $I)
    {
        // $note = new Note;
        
        // Virtuelle Datenbank generieren
        // Test::double('Users', ['name' => 'test']);
        
        $user = 'test';
        
        // Operationen ausführen
        
        // Vergleichen
        
        $I->assertTrue($user == 'test');  
        
    }
    
    public function tryToCheckIfPaperRelationshipExits(UnitTester $I)
    {
        $note = new Note;
        $I->seeMethod($note,'paper');
    }
    
    public function tryToCreateTransactionsRecord(UnitTester $I)
    {
        $user_id = $I->haveRecord('users', [
            'username' => 'Davert',
            'password' => 'Test',
            'firstname' => 'Monja',
            'lastname' => 'Santner',
            'role' => 'Wife',
            'created_at' => 'NOW',
            'updated_at' => 'NOW'
            ]);
        $I->seeRecord('users', array('username' => 'Davert'));
    }
    
}