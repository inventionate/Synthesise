<?php
use \FunctionalTester;

class UserCest
{
    public function _before()
    {
        TestCommons::prepareLaravel();
    }

    // tests
    public function tryToCreateTransactionsRecord(FunctionalTester $I)
    {
        $user_id = $I->haveRecord('users', [
            'username' => 'Davert',
            'password' => 'Test',
            'firstname' => 'Monja',
            'lastname' => 'Santner',
            'role' => 'Wife',
            'created_at' => 'NOW',
            'updated_at' => 'NOW'
            ]);
        $I->seeRecord('users', array('username' => 'Davert'));
    }
}