<?php

use Illuminate\Http\UploadedFile;

class PaperRepositoryCest
{
    /**
     * Test store a new paper.
     */
    public function testStorePaper(IntegrationTester $I)
    {
        $text_path = UploadedFile::fake()->create('Test.pdf')->store('test');

        // Funktion aufrufen.
        Paper::store($text_path, "New Text", "New Author", "Old Lection");

        // Checken, ob Paper angelegt wurde.
        $I->seeRecord('Synthesise\Paper', ['name' => 'New Text']);

        // Delete fake directory.
        Storage::deleteDirectory('test');
    }

    /**
     * Test update a paper.
     */
    public function testUpdatePaper(IntegrationTester $I)
    {
        // Fake PDF.
        $text_path = UploadedFile::fake()->create('Test.pdf')->store('test');

        // Fake paper.
        $I->have('Synthesise\Paper', ['name' => 'A Text.', 'path' => $text_path, 'author' => 'Me']);

        // Update paper.
        Paper::update($text_path, "A Text.", "Newer Author", "Old Lection");

        // Checken, ob Paper angelegt wurde.
        $I->seeRecord('Synthesise\Paper', ['author' => 'Newer Author']);

        // Delete fake directory.
        Storage::deleteDirectory('test');
    }

}
