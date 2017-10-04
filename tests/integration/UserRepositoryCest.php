<?php

use _data\Factories as Factories;

class UserRepositoryCest
{
    /**
     * Test store new user.
     */
    public function testStoreNewUser(IntegrationTester $I)
    {

        // Store new user.
        User::store('Kate', 'Student', 'First', 'Last', 'mail@me.de', Hash::make('cool'), NULL);

        // Test attachement.
        $I->seeRecord('Synthesise\User', ['username' => 'Kate']);
    }

    /**
     * Test update user.
     */
    public function testUpdateUser(IntegrationTester $I)
    {
        // Fake data.
        $I->have('Synthesise\User');

        // Store new user.
        User::update(1, 'Kate', 'Student', 'First', 'Last', 'mail@me.de', Hash::make('cool'));

        // Test attachement.
        $I->seeRecord('Synthesise\User', ['username' => 'Kate']);
    }

    /**
     * Test get username.
     */
    public function testGetUsername(IntegrationTester $I)
    {
        // Fake data.
        $I->have('Synthesise\User', ['username' => 'Bob', 'firstname' => 'Jonathan', 'lastname' => 'Archer', 'password' => Hash::make('123')]);

        $I->amLoggedAs(['username' => 'Bob', 'password' => '123']);

        // Get name.
        $username = User::getUsername();

        // Test.
        $I->assertEquals($username, 'Jonathan Archer');
    }

    /**
     * Test get email.
     */
    public function testGetEmail(IntegrationTester $I)
    {
        // Fake data.
        $I->have('Synthesise\User', ['username' => 'Bob', 'firstname' => 'Jonathan', 'lastname' => 'Archer', 'email' => 'hello@me.de', 'password' => Hash::make('123')]);

        $I->amLoggedAs(['username' => 'Bob', 'password' => '123']);

        // Get name.
        $email = User::getEmail();

        // Test.
        $I->assertEquals($email, 'hello@me.de');
    }

    /**
     * Test find by username.
     */
    public function testFindUserByUsername(IntegrationTester $I)
    {
        // Fake data.
        $I->have('Synthesise\User', ['username' => 'Bob', 'firstname' => 'Jonathan', 'lastname' => 'Archer', 'email' => 'hello@me.de', 'password' => Hash::make('123')]);

        // Find user by username.
        $user = User::findByUsername('Bob');

        // Test.
        $I->assertEquals($user->firstname, 'Jonathan');

    }

    /**
     * Test don't find by username.
     */
    public function testDontFindUserByUsername(IntegrationTester $I)
    {
        // Fake data.
        $I->have('Synthesise\User', ['username' => 'Bob', 'firstname' => 'Jonathan', 'lastname' => 'Archer', 'email' => 'hello@me.de', 'password' => Hash::make('123')]);

        // Find user by username.
        $user = User::findByUsername('Bobby');

        // Test.
        $I->assertNull($user);
    }

    /**
     * Test get all users.
     */
    public function testGetAllUsers(IntegrationTester $I)
    {
        // Fake data.
        $I->haveMultiple('Synthesise\User', 999);

        // Find user by username.
        $users = User::getAll();

        // Test.
        $I->assertEquals($users->count(), 999);
    }

    /**
     * Test get all users by role.
     */
    public function testGetAllUsersByRole(IntegrationTester $I)
    {
        // Fake data.
        $I->haveMultiple('Synthesise\User', 999);

        $I->haveMultiple('Synthesise\User', 99, ['role' => 'Admin']);

        // Find user by username.
        $users = User::getAllByRole('Admin');

        // Test.
        $I->assertEquals($users->count(), 99);
    }

    /**
     * Test delete an users.
     */
    public function testDeleteAnUser(IntegrationTester $I)
    {
        // Fake data.
        $I->have('Synthesise\User', ['id' => 1]);

        // Delete user.
        User::delete(1);

        // Test.
        $I->dontSeeRecord('Synthesise\User', ['id' => 1]);
    }


    /**
     * Test delete many users.
     */
    public function testDeleteManyUsers(IntegrationTester $I)
    {

        // Fake data.
        $I->have('Synthesise\Seminar', ['name' => 'Sem 1']);

        User::store('Bob', 'Admin', 'Bobby', 'Eaton', 'new@me.de', Hash::make('123'), $seminar_names = ['Sem 1']);

        // Delete users.
        User::deleteMany([1], ['Sem 1']);

        // Test.
        $I->dontSeeRecord('Synthesise\User', ['username' => 'Bob']);
    }

    /**
     * Test delete all users by role.
     */
    public function testDeleteAllUsersByRole(IntegrationTester $I)
    {

        // Fake data.
        $I->have('Synthesise\Seminar', ['name' => 'Sem 1']);

        User::store('Bob 1', 'Admin', 'Bobby', 'Eaton', 'new@me.de', Hash::make('123'), $seminar_names = ['Sem 1']);

        User::store('Bob 2', 'Student', 'Bobby', 'Eaton', 'new@me.de', Hash::make('123'), $seminar_names = ['Sem 1']);

        User::store('Bob 3', 'Student', 'Bobby', 'Eaton', 'new@me.de', Hash::make('123'), $seminar_names = ['Sem 1']);

        // Delete users.
        User::deleteAll('Student', [], ['Sem 1']);

        // Test.
        $I->seeRecord('Synthesise\User', ['username' => 'Bob 1']);
        $I->dontSeeRecord('Synthesise\User', ['username' => 'Bob 2']);
        $I->dontSeeRecord('Synthesise\User', ['username' => 'Bob 3']);
    }

    /**
     * Test attach to seminar.
     */
    public function testAttachUserToSeminar(IntegrationTester $I)
    {

        // Fake data.
        $I->have('Synthesise\Seminar', ['name' => 'Sem 1']);

        $I->have('Synthesise\User', ['username' => 'Kate']);

        // Delete users.
        User::attachToSeminar('Kate', 'Sem 1');

        $attached_seminars = User::findByUsername('Kate')->seminars()->count();

        // Test attachement.
        $I->assertEquals($attached_seminars, 1);
    }

    /**
     * Test get all user notes.
     */
    public function testGetAllUserNotes(IntegrationTester $I)
    {
        // Fake Data
        $I->have('Synthesise\User', ['id' => 1]);
        $I->have('Synthesise\Lection', ['name' => 'Lec']);
        $I->have('Synthesise\Cuepoint', ['id' => 1]);
        $I->have('Synthesise\Seminar', ['name' => 'Sem']);
        $I->have('Synthesise\Note', ['user_id' => 1, 'cuepoint_id' => 1, 'lection_name' => 'Lec', 'seminar_name' => 'Sem', 'note' => Crypt::encrypt('Hope is there!')]);

        // Get notes.
        $notes = User::getAllNotes(1, 'Lec', 'Sem');

        // Test notes.
        $I->assertTrue(str_contains($notes, 'Hope is there!'));
    }
}
