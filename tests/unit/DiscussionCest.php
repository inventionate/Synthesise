<?php
use \UnitTester;

class DiscussionCest
{

    /**
    * Testet, ob ein Discussion Objekt generiert werden kann.
    * @author Fabian Mundt <f.mundt@ph-karlsruhe.de>
    */
    public function createANewDiscussion(UnitTester $I)
    {
        $I->canCreate('Discussion');
    }
}