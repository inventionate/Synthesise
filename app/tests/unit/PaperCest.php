<?php
use \UnitTester;

class PaperCest
{             
    
    /**
    * Testet, ob ein Paper Objekt generiert werden kann.
    * @author Fabian Mundt <f.mundt@ph-karlsruhe.de>
    */
    public function createANewPaper(UnitTester $I)
    {
        $I->canCreate('Paper');
    }
    
    /**
    * Testet, ob die Datenbankverknüpfuung Paper-Note definiert wurde
    * @author Fabian Mundt <f.mundt@ph-karlsruhe.de>
    */
    public function checkIfNoteRelationshipExits(UnitTester $I)
    {
        $paper = new Paper;
        $I->seeMethod($paper,'notes');
    }
    
}