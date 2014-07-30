<?php
use \UnitTester;

class AnswerCest
{
    public function _before()
    {
    }

    public function _after()
    {
    }

    public function createANewAnswer(UnitTester $I)
    {
        $I->canCreate('Answer');
    }
}