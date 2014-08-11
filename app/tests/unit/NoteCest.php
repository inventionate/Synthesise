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
    
    /**
    * Testet, ob ein Note Objekt generiert werden kann.
    * @author Fabian Mundt <f.mundt@ph-karlsruhe.de>
    */
    public function createANewNote(UnitTester $I)
    {
        $I->canCreate('Note');
    }
    
    /**
    * Testet, ob die Datenbankverknüpfuung Note-Paper definiert wurde
    * @author Fabian Mundt <f.mundt@ph-karlsruhe.de>
    */
    public function checkIfPaperRelationshipExits(UnitTester $I)
    {
        $note = new Note;
        $I->seeMethod($note,'paper');
    }
    
    /**
    * Testet, ob ein virtueller Datenbankeintrag erzeugt werden kann
    * @author Fabian Mundt <f.mundt@ph-karlsruhe.de>
    */
    public function createTransactionsRecord(UnitTester $I)
    {
        $user_id = $I->haveRecord('users', [
            'username' => 'Davert',
            'password' => 'Test',
            'firstname' => 'Monja',
            'lastname' => 'Santner',
            'role' => 'Wife',
            'created_at' => '0000-00-00 00:00:00',
            'updated_at' => '0000-00-00 00:00:00',
            'permissions' => 'Test'
            ]);
        $I->seeRecord('users', array('username' => 'Davert'));
    }
    
}