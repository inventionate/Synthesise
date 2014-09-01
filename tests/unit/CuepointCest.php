<?php
use \UnitTester;

class CuepointCest
{

    /**
    * Testet, ob ein Cuepoint Objekt generiert werden kann.
    * @author Fabian Mundt <f.mundt@ph-karlsruhe.de>
    */
    public function createANewCuepoint(UnitTester $I)
    {
       $I->canCreate('Cuepoint');
    }
    
}