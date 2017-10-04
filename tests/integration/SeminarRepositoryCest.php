<?php

use Illuminate\Http\UploadedFile;

class SeminarRepositoryCest {

    /**
     * Test to get a seminar.
     */
    public function testGetSeminar(IntegrationTester $I)
    {

        // Sample data.
        $I->have('Synthesise\Seminar', ['name' => 'Hello again!']);

        // Recieve data.
        $seminar = Seminar::get('Hello again!');

        // Test seminar.
        $I->assertEquals($seminar->name, 'Hello again!');
    }

    /**
     * Test store a new seminar.
     */
    public function testStoreNewSeminar(IntegrationTester $I)
    {
        // Recieve data.
        Seminar::store('New Seminar', 'Timo', 'timo@pul@si.so', 'Coole sachen.', 'M1', 'Viel Text.', 'path/to/image.jpg', 'Some Text.', 'More text.', 'More text.', 'Even more text.', 'path/to/text.pdf', '2018-01-01', '2019-01-01', NULL, NULL);

        // Test seminar.
        $I->seeRecord('Synthesise\Seminar', ['name' => 'New Seminar']);
    }

    /**
     * Test update seminar.
     */
    public function testUpdateSeminar(IntegrationTester $I)
    {

        // Sample data.
        $I->have('Synthesise\Seminar', ['name' => 'New Seminar']);

        // Recieve data.
        Seminar::update('New Seminar', 'Timo', 'timo@pul@si.so', 'Coole sachen.', 'M1', 'Viel Text.', 'path/to/image.jpg', 'Some Text.', 'More text.', 'More text.', 'Even more text.', 'path/to/text.pdf', '2018-01-01', '2019-01-01', NULL, NULL);

        // Test seminar.
        $I->seeRecord('Synthesise\Seminar', ['author' => 'Timo']);
    }

    /**
     * Test delete seminar.
     */
    public function testDeleteSeminar(IntegrationTester $I)
    {
        // Sample data.
        $I->have('Synthesise\Seminar', ['name' => 'New Seminar']);

        // Recieve data.
        Seminar::delete('New Seminar');

        // Test seminar.
        $I->dontSeeRecord('Synthesise\Seminar', ['name' => 'New Seminar']);
    }

    /**
     * Test delete seminar document.
     */
    public function testDeleteSeminarDocument(IntegrationTester $I)
    {
        $text_path = UploadedFile::fake()->create('Test.pdf')->store('test');

        // Sample data.
        $I->have('Synthesise\Seminar', ['name' => 'New Seminar', 'info_path' => $text_path]);

        // Recieve data.
        Seminar::deleteDocument('New Seminar');

        // Test seminar.
        $I->seeRecord('Synthesise\Seminar', ['name' => 'New Seminar', 'info_path' => NULL]);

        // Delete fake directory.
        Storage::deleteDirectory('test');
    }

    /**
     * Test get seminar user count.
     */
    public function testGetAllWithUserCount(IntegrationTester $I)
    {
        // Sample data.
        $I->have('Synthesise\Seminar', ['name' => 'New Seminar']);

        $I->have('Synthesise\User', ['username' => 'Bob', 'password' => Hash::make('123')]);

        $I->haveRecord('seminar_user', ['id' => 1, 'seminar_name' => 'New Seminar', 'user_id' => 1]);

        // Authenticate.
        $I->amLoggedAs(['username' => 'Bob', 'password' => '123']);

        // Recieve data.
        $seminars = Seminar::getAllWithUserCount('New Seminar');

        // Test seminar.
        $I->assertEquals($seminars->first()->users_count, "1");
    }

    /**
     * Test get seminar auth editors.
     */
    public function testGetSeminarAuthorizedEditors(IntegrationTester $I)
    {
        // Sample data.
        $I->have('Synthesise\Seminar', ['name' => 'New Seminar', 'authorized_editors' => ['One Man', 'Another Man']]);

        // Recieve data.
        $auth_editors = Seminar::getAuthorizedEditors('New Seminar');

        // Test seminar.
        $I->assertEquals($auth_editors, ['One Man', 'Another Man']);
    }

    /**
     * Test seminar auth editor.
     */
    public function testSeminarAuthorizedEditor(IntegrationTester $I)
    {
        // Sample data.
        $I->have('Synthesise\Seminar', ['name' => 'New Seminar', 'authorized_editors' => ['One Man', 'Another Man']]);

        $I->have('Synthesise\User', ['username' => 'One Man', 'password' => Hash::make('123')]);

        // Authenticate.
        $I->amLoggedAs(['username' => 'One Man', 'password' => '123']);

        // Recieve data.
        $auth_editor = Seminar::authorizedEditor('New Seminar');

        // Test seminar.
        $I->assertTrue($auth_editor);
    }

    /**
     * Test seminar auth mentor.
     */
    public function testSeminarAuthorizedMentor(IntegrationTester $I)
    {
        $I->have('Synthesise\User', ['username' => 'One Man', 'password' => Hash::make('123'), 'role' => 'Mentor']);

        // Authenticate.
        $I->amLoggedAs(['username' => 'One Man', 'password' => '123']);

        // Recieve data.
        $auth_mentor = Seminar::authorizedMentor('New Seminar');

        // Test seminar.
        $I->assertTrue($auth_mentor);
    }

    /**
     * Test seminar get all sections.
     */
    public function testGetAllSections(IntegrationTester $I)
    {
        // Sample data.
        $I->have('Synthesise\Seminar', ['name' => 'Interstellar']);

        $I->have('Synthesise\Section', ['seminar_name' => 'Interstellar']);

        $I->have('Synthesise\Section', ['seminar_name' => 'Interstellar']);

        // Recieve data.
        $sections = Seminar::getAllSections('Interstellar');

        // Test seminar.
        $I->assertEquals($sections->count(), 2);
    }

    /**
     * Test seminar get all lections.
     */
    public function testGetAllLections(IntegrationTester $I)
    {
        // Sample data.
        $I->have('Synthesise\Seminar', ['name' => 'Interstellar']);

        $I->have('Synthesise\Section', ['id' => 1, 'seminar_name' => 'Interstellar']);

        $I->have('Synthesise\Section', ['id' => 2, 'seminar_name' => 'Interstellar']);

        $I->have('Synthesise\Lection', ['name' => 'Interstellar Intro']);

        $I->have('Synthesise\Lection', ['name' => 'Interstellar Extro']);

        $I->haveRecord('lection_section', ['id' => 1, 'lection_name' => 'Interstellar Intro', 'section_id' => 1, 'available_from' => '2014-09-17', 'available_to' => '2014-09-17']);

        $I->haveRecord('lection_section', ['id' => 2, 'lection_name' => 'Interstellar Extro', 'section_id' => 2, 'available_from' => '2014-09-17', 'available_to' => '2014-09-17']);

        // Recieve data.
        $lections = Seminar::getAllLections('Interstellar');

        // Test seminar.
        $I->assertEquals($lections->count(), 2);
    }

    /**
     * Test seminar get current lection.
     */
    public function testGetCurrentLection(IntegrationTester $I)
    {
        // Sample data.
        $I->have('Synthesise\Seminar', ['name' => 'Interstellar']);

        $I->have('Synthesise\Section', ['id' => 1, 'seminar_name' => 'Interstellar']);

        $I->have('Synthesise\Section', ['id' => 2, 'seminar_name' => 'Interstellar']);

        $I->have('Synthesise\Lection', ['name' => 'Interstellar Intro']);

        $I->have('Synthesise\Lection', ['name' => 'Interstellar Extro']);

        $I->haveRecord('lection_section', ['id' => 1, 'lection_name' => 'Interstellar Intro', 'section_id' => 1, 'available_from' => '2014-09-17', 'available_to' => '2100-09-17']);

        $I->haveRecord('lection_section', ['id' => 2, 'lection_name' => 'Interstellar Extro', 'section_id' => 2, 'available_from' => '2014-09-17', 'available_to' => '2014-09-17']);

        // Recieve data.
        $current_lection = Seminar::getCurrentLection('Interstellar');

        // Test seminar.
        $I->assertEquals($current_lection->name, "Interstellar Intro");
    }

    /**
     * Test seminar get all messages.
     */
    public function testGetAllMessages(IntegrationTester $I)
    {
        // Sample data.
        $I->have('Synthesise\Seminar', ['name' => 'Interstellar']);

        $I->haveMultiple('Synthesise\Message', 43, ['seminar_name' => 'Interstellar']);

        // Recieve data.
        $messages = Seminar::getAllMessages('Interstellar');

        // Test seminar.
        $I->assertEquals($messages->count(), 43);
    }

    /**
     * Test seminar get current paper
     */
    public function testGetCurrentPaper(IntegrationTester $I)
    {
        // Sample data.
        $I->have('Synthesise\Seminar', ['name' => 'Interstellar']);

        $I->have('Synthesise\Section', ['id' => 1, 'seminar_name' => 'Interstellar']);

        $I->have('Synthesise\Section', ['id' => 2, 'seminar_name' => 'Interstellar']);

        $I->have('Synthesise\Lection', ['name' => 'Interstellar Intro']);

        $I->have('Synthesise\Lection', ['name' => 'Interstellar Extro']);

        $I->haveRecord('lection_section', ['id' => 1, 'lection_name' => 'Interstellar Intro', 'section_id' => 1, 'available_from' => '2014-09-17', 'available_to' => '2100-09-17']);

        $I->haveRecord('lection_section', ['id' => 2, 'lection_name' => 'Interstellar Extro', 'section_id' => 2, 'available_from' => '2014-09-17', 'available_to' => '2014-09-17']);

        $I->have('Synthesise\Paper', ['lection_name' => 'Interstellar Intro', 'name' => 'A Text']);

        // Recieve data.
        $current_paper = Seminar::getCurrentPaper('Interstellar');

        // Test seminar.
        $I->assertEquals($current_paper->name, 'A Text');
    }

    /**
     * Test seminar get seminar users by role.
     */
    public function testGetSeminarUsersByRole(IntegrationTester $I)
    {
        // Sample data.
        $I->have('Synthesise\Seminar', ['name' => 'Interstellar']);

        $I->haveMultiple('Synthesise\User', 3, ['role' => 'Admin']);

        $I->haveMultiple('Synthesise\User', 39, ['role' => 'Student']);

        $I->haveRecord('seminar_user', ['id' => 1, 'seminar_name' => 'Interstellar', 'user_id' => 1]);

        $I->haveRecord('seminar_user', ['id' => 2, 'seminar_name' => 'Interstellar', 'user_id' => 2]);

        $I->haveRecord('seminar_user', ['id' => 3, 'seminar_name' => 'Interstellar', 'user_id' => 3]);

        // Recieve data.
        $users = Seminar::getAllUsersByRole('Interstellar', 'Admin');

        // Test seminar.
        $I->assertEquals($users->count(), 3);
    }

    /**
     * Test seminar get feedback mail.
     */
    public function testGetFeedbackMail(IntegrationTester $I)
    {
        // Sample data.
        $I->have('Synthesise\Seminar', ['name' => 'Interstellar', 'contact' => 'cool@the.gang']);

        // Recieve data.
        $email = Seminar::getFeedbackMail('Interstellar');

        // Test seminar.
        $I->assertEquals($email, 'cool@the.gang');
    }

    /**
     * Test seminar get author.
     */
    public function testGetAuthor(IntegrationTester $I)
    {
        // Sample data.
        $I->have('Synthesise\Seminar', ['name' => 'Interstellar', 'author' => 'Nathanael']);

        // Recieve data.
        $author = Seminar::getAuthor('Interstellar');

        // Test seminar.
        $I->assertEquals($author, 'Nathanael');
    }

    /**
     * Test seminar get lection authors.
     */
    public function testGetLectionAuthors(IntegrationTester $I)
    {
        // Sample data.
        $I->have('Synthesise\Seminar', ['name' => 'Interstellar']);

        $I->have('Synthesise\Section', ['id' => 1, 'seminar_name' => 'Interstellar']);

        $I->have('Synthesise\Section', ['id' => 2, 'seminar_name' => 'Interstellar']);

        $I->have('Synthesise\Lection', ['name' => 'Interstellar Intro']);

        $I->have('Synthesise\Lection', ['name' => 'Interstellar Extro']);

        $I->haveRecord('lection_section', ['id' => 1, 'lection_name' => 'Interstellar Intro', 'section_id' => 1, 'available_from' => '2014-09-17', 'available_to' => '2100-09-17']);

        $I->haveRecord('lection_section', ['id' => 2, 'lection_name' => 'Interstellar Extro', 'section_id' => 2, 'available_from' => '2014-09-17', 'available_to' => '2014-09-17']);

        // Recieve data.
        $authors = Seminar::getAllLectionAuthors('Interstellar');

        // Test seminar.
        $I->assertEquals(sizeof($authors), 2);
    }

    /**
     * Test seminar get disqus shortname.
     */
    public function testGetDisqusShortname(IntegrationTester $I)
    {
        // Sample data.
        $I->have('Synthesise\Seminar', ['name' => 'Interstellar', 'disqus_shortname' => 'schlumpf']);

        // Recieve data.
        $disqus = Seminar::getDisqusShortname('Interstellar');

        // Test seminar.
        $I->assertEquals($disqus, 'schlumpf');
    }

    /**
     * Test seminar get all infoblocks.
     */
    public function testGetAllInfoblocks(IntegrationTester $I)
    {
        // Sample data.
        $I->have('Synthesise\Seminar', ['name' => 'Interstellar', 'disqus_shortname' => 'schlumpf']);

        $I->haveMultiple('Synthesise\Infoblock', 12, ['seminar_name' => 'Interstellar']);

        // Recieve data.
        $infoblocks = Seminar::getAllInfoblocks('Interstellar');

        // Test seminar.
        $I->assertEquals($infoblocks->count(), 12);
    }

    /**
     * Test seminar get all users by role.
     */
    public function testGetAllUsers(IntegrationTester $I)
    {
        // Sample data.
        $I->have('Synthesise\Seminar', ['name' => 'Interstellar']);

        $I->haveMultiple('Synthesise\User', 3, ['role' => 'Admin']);

        $I->haveMultiple('Synthesise\User', 39, ['role' => 'Student']);

        $I->haveRecord('seminar_user', ['id' => 1, 'seminar_name' => 'Interstellar', 'user_id' => 1]);

        $I->haveRecord('seminar_user', ['id' => 2, 'seminar_name' => 'Interstellar', 'user_id' => 2]);

        $I->haveRecord('seminar_user', ['id' => 3, 'seminar_name' => 'Interstellar', 'user_id' => 3]);

        // Recieve data.
        $users = Seminar::getAllUsers('Interstellar');

        // Test seminar.
        $I->assertEquals($users->count(), 3);
    }

    /**
     * Test seminar set auth editor.
     */
    public function testSetAuthorizedEditor(IntegrationTester $I)
    {
        // Sample data.
        $I->have('Synthesise\Seminar', ['name' => 'Interstellar']);

        // Recieve data.
        Seminar::setAuthorizedEditor('Interstellar', 'Kat');

        $seminar = $I->grabRecord('Synthesise\Seminar', ['name' => 'Interstellar']);

        // Test seminar.
        $I->assertTrue(in_array('Kat', $seminar->authorized_editors));
    }

    /**
     * Test seminar delete auth editor.
     */
    public function testDeleteAuthorizedEditor(IntegrationTester $I)
    {
        // Sample data.
        $I->have('Synthesise\Seminar', ['name' => 'Interstellar', 'authorized_editors' => ['Katy', 'Dave']]);

        // Recieve data.
        Seminar::deleteAuthorizedEditor('Interstellar', 'Katy');

        $seminar = $I->grabRecord('Synthesise\Seminar', ['name' => 'Interstellar']);

        // Test seminar.
        $I->assertFalse(in_array('Katy', $seminar->authorized_editors));
    }

    /**
     * Test get all seminar titles.
     */
    public function testGetAllSeminarTitles(IntegrationTester $I)
    {
        // Sample data.
        $I->haveMultiple('Synthesise\Seminar', 54);

        // Recieve data.
        $seminars = Seminar::getAllTitles();

        // Test seminar.
        $I->assertEquals(sizeof($seminars), 54);
    }
}
