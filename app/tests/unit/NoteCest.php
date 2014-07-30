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
    public function createANewNote(UnitTester $I)
    {
        $I->canCreate('Note');
    }
    
    public function checkIfPaperRelationshipExits(UnitTester $I)
    {
        $note = new Note;
        $I->seeMethod($note,'paper');
    }
    
    public function createTransactionsRecord(UnitTester $I)
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