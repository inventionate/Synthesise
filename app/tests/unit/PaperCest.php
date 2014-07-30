<?php
use \UnitTester;

class PaperCest
{             
    
    public function createANewPaper(UnitTester $I)
    {
        $I->canCreate('Paper');
    }
    
    public function checkIfNoteRelationshipExits(UnitTester $I)
    {
        $paper = new Paper;
        $I->seeMethod($paper,'notes');
    }
    
}