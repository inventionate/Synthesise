<?php
use \UnitTester;

class FAQCest
{
   
    /**
    * Testet, ob ein FAQ Objekt generiert werden kann.
    * @author Fabian Mundt <f.mundt@ph-karlsruhe.de>
    */
    public function createANewFAQ(UnitTester $I)
    {
        $I->canCreate('FAQ');
    }
}