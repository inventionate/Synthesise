<?php
use \UnitTester;

class CuepointCest
{
    public function _before()
    {
    }

    public function _after()
    {
    }

    public function createANewCuepoint(UnitTester $I)
    {
       $I->canCreate('Cuepoint');
    }
    
}