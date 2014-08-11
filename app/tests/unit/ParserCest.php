<?php
use \UnitTester;
use AspectMock\Test;

class ParserCest
{
    
    public function _after()
    {
        Test::clean();
    }
    
    /**
     * Testet ob ein Pareser Objekt erzeugt werden kann.
     * @author Fabian Mundt <f.mundt@ph-karlsruhe.de>
     */
    public function createANewParser(UnitTester $I)
    {
        $I->canCreate('Parser');
    }
    
    /**
    * Testet die normalisierte Rückgabe.
     * @author Fabian Mundt <f.mundt@ph-karlsruhe.de>
     * @todo Besser ausformulieren!
     */
    public function normalizeAnURL(UnitTester $I)
    {
        $url = "test me";
        
        $normalizedURL = Parser::normalizeURL($url);
        
        $I->AssertEquals("test+me",$normalizedURL);
        
        $url = "1966 war ein gutes Jahr!";
        
        $normalizedURL = Parser::normalizeURL($url);
        
        $I->AssertEquals("1966+war+ein+gutes+Jahr%21",$normalizedURL);
        
        $url = "Wozu ist das Leben gut?";
        
        $normalizedURL = Parser::normalizeURL($url);
        
        $I->AssertEquals("Wozu+ist+das+Leben+gut%3F",$normalizedURL);   
        
    }
    
}