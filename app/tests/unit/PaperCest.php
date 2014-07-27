<?php
use \UnitTester;

class PaperCest
{             
    
    public function tryToCreateANewPaper(UnitTester $I)
    {
        $paper = new Paper;
    }
    
    public function tryToCheckIfNoteRelationshipExits(UnitTester $I)
    {
        $paper = new Paper;
        $I->seeMethod($paper,'notes');
    }
    
}