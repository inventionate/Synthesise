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
     * @author Fabian Mundt <mundt@ph-karlsruhe.de>
     */
    public function createANewParser(UnitTester $I)
    {
        $I->canCreate('Parser');
    }
    
    /**
    * Testet die normalisierte Rückgabe.
     * @author Fabian Mundt <mundt@ph-karlsruhe.de>
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
    
    /**
     * Testet die Funktionalität um alle Cupeoints als HTML Markup zu erzeugen
     * 
     * @author Fabian Mundt <mundt@ph-karlsruhe.de>
     */
    public function generateHtmlMarkup(UnitTester $I)
    {
        $title = "Rites de Passage";
        
        $content ="<h2>Arnold van Gennep</h2>";
        
        $parsed = str_replace(array("\r","\n"," ","\t"),array("","","",""),Parser::htmlMarkup($title, $content));
        
        $html = str_replace(array("\r","\n"," ","\t"),array("","","",""),'<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /><style type="text/css">h1,h2,h3 {font-family: sans-serif;}p {font-family: serif;}#header {position: fixed;top: -25px;left: 0px;right: 0px;text-align: right;font-size: 12px;}#footer {position: fixed;bottom: 0px;left: 0px;right: 0px;height: 40px;text-align: right;font-size: 14px;}.pagenum:before {content: counter(page);}</style></head><body><h1>Fähnchen zu Rites de Passage</h1><div id="header"><p>Erziehungswissenschaftliche Grundfragen pädagogischen Denkens und Handelns – WS 2013/2014 – PH Karlsruhe</p></div><h2>Arnold van Gennep</h2><div id="footer"><p>Seite <span class="pagenum"></span></p></div></body></html>');
        
        $I->AssertEquals($html, $parsed);
    }
    
    /**
     * Test das Normalisieren von Dateinamen aus Inhaltsnamen
     * 
     * @author Fabian Mundt <mundt@ph-karlsruhe.de>
     */
     public function normalizeAName(UnitTester $I)
     {
         $name = "Testvideo ä ö ü ß ? ! - – —";
         
         $normalizedName = Parser::normalizeName($name);
         
         $I->AssertEquals("testvideo_ae_oe_ue_ss________",$normalizedName);
     }
    
}