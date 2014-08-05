<?php
use \UnitTester;

class VideoCest
{
    
    /**
    * Testet ob ein Video Objekt erzeugt werden kann.
    * @author Fabian Mundt <f.mundt@ph-karlsruhe.de>
    */
    public function createANewVideo(UnitTester $I)
    {
       $I->canCreate('Video');
    }
    
    
}