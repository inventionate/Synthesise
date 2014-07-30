<?php
use \UnitTester;

class VideoCest
{
    public function _before()
    {
    }

    public function _after()
    {
    }

    public function createANewVideo(UnitTester $I)
    {
       $I->canCreate('Video');
    }
    
    
}