<?php

class SectionRepositoryCest
{
    /**
     * Test get all lections.
     */
    public function testGetAllLections(IntegrationTester $I) {

        // Sample data.
        $I->have('Synthesise\Section', ['id' => 1]);
        $I->have('Synthesise\Lection', ['name' => 'Lection 1']);
        $I->have('Synthesise\Lection', ['name' => 'Lection 2']);
        $I->haveRecord('lection_section', ['id' => 1, 'lection_name' => 'Lection 1', 'section_id' => 1, 'available_from' => '2017-01-01', 'available_to' => '2017-10-01']);
        $I->haveRecord('lection_section', ['id' => 2, 'lection_name' => 'Lection 2', 'section_id' => 1, 'available_from' => '2017-01-01', 'available_to' => '2017-10-01']);

        // Get all lections.
        $lections = Section::getAllLections(1);

        // Test.
        $I->assertEquals($lections->count(), 2);
    }

    /**
     * Test get all section authors.
     */
    public function testGetAllAuthors(IntegrationTester $I)
    {
        // Sample data.
        $I->have('Synthesise\Section', ['id' => 1]);
        $I->have('Synthesise\Lection', ['name' => 'Lection 1', 'author' => 'First']);
        $I->have('Synthesise\Lection', ['name' => 'Lection 2', 'author' => 'Second']);
        $I->haveRecord('lection_section', ['id' => 1, 'lection_name' => 'Lection 1', 'section_id' => 1, 'available_from' => '2017-01-01', 'available_to' => '2017-10-01']);
        $I->haveRecord('lection_section', ['id' => 2, 'lection_name' => 'Lection 2', 'section_id' => 1, 'available_from' => '2017-01-01', 'available_to' => '2017-10-01']);

        // Get all lections.
        $authors = Section::getAllAuthors(1);

        // Test.
        $I->assertEquals($authors, ["First", "Second"]);
    }

    /**
     * Test store a new section.
     */
    public function testStoreSection(IntegrationTester $I)
    {
        // Store section.
        Section::store('New Name', 'New Seminar', 'path/to/text');

        // Test if section ist stored.
        $I->seeRecord('Synthesise\Section', ['name' => 'New Name']);
    }

    /**
     * Test update a section.
     */
    public function testUpdateSection(IntegrationTester $I)
    {
        // Sample data.
        $I->have('Synthesise\Section', ['id' => 1, 'name' => 'Test me!']);

        // Update section.
        Section::update(1, 'New Name', 'New Seminar', 'path/to/text');

        // Test if section ist stored.
        $I->seeRecord('Synthesise\Section', ['name' => 'New Name']);
    }

    /**
     * Test delete a section.
     */
    public function testDeleteSection(IntegrationTester $I)
    {
        // Sample data.
        $I->have('Synthesise\Section', ['id' => 1, 'name' => 'Test me!']);

        // Update section.
        Section::delete(1);

        // Test if section ist stored.
        $I->dontSeeRecord('Synthesise\Section', ['name' => 'Test me!']);
    }

}
