<?php

class NoteRepositoryCest
{

    /**
     * Testet den Abruf einer Notiz.
     */
    public function testGet(IntegrationTester $I)
    {
        // Beispieldatensatz generieren
        $I->have('Synthesise\Lection', ['id' => 1, 'name' => 'Space Lection']);

        $I->have('Synthesise\Sequence', ['id' => 1, 'lection_name' => 'Space Lection', 'position' => 1]);

        $I->have('Synthesise\Cuepoint', ['id' => 1, 'sequence_id' => 1]);

        $I->have('Synthesise\Note', ['user_id' => 1, 'cuepoint_id' => 1, 'lection_name' => 'Space Lection', 'seminar_name' => 'Sample Seminar', 'note' => Crypt::encrypt('A note!')]);

        // Methode aufrufen
        $note = Note::get(1, 1, 'Space Lection', 'Sample Seminar', 1);

        // Testen
        $I->AssertEquals($note, 'A note!');
    }

    /**
     * Testet das Speichern einer neuen Notiz.
     */
    public function testStoreNewNote(IntegrationTester $I)
    {
        // Beispieldatensatz generieren
        $I->have('Synthesise\Lection', ['name' => 'Lection']);

        $I->have('Synthesise\Sequence', ['lection_name' => 'Lection', 'position' => 1]);

        $I->have('Synthesise\Cuepoint', ['id' => 1, 'sequence_id' => 1]);

        // Methode aufrufen
        Note::store(1, 1, 'Lection', 'Seminar', 'Cool!', 1);

        // Record checken
        $I->seeRecord('Synthesise\Note');
    }

    /**
     * Testet das Updaten einer Notiz.
     */
    public function testUpdateNote(IntegrationTester $I)
    {
        // Beispieldatensatz generieren
        $I->have('Synthesise\Lection', ['name' => 'Lection']);

        $I->have('Synthesise\Sequence', ['lection_name' => 'Lection', 'position' => 1]);

        $I->have('Synthesise\Cuepoint', ['id' => 1, 'sequence_id' => 1]);

        $I->have('Synthesise\Note', ['user_id' => 1, 'cuepoint_id' => 1, 'lection_name' => 'Lection', 'seminar_name' => 'Sample Seminar', 'note' => Crypt::encrypt('A note!')]);

        // Methode aufrufen
        Note::update(1, 1, 'Lection', 'Sample Seminar', 'New Content', 1);

        // Record abfragen
        $note = $I->grabRecord('Synthesise\Note', ['user_id' => 1, 'cuepoint_id' => 1, 'lection_name' => 'Lection', 'seminar_name' => 'Sample Seminar']);

        // Überprüfen
        $I->assertEquals(Crypt::decrypt($note->note), 'New Content');
    }

    /**
     * Testet das Löschen einer leeren Notiz.
     */
    public function testDeleteNote(IntegrationTester $I)
    {
        // Beispieldatensatz generieren
        $I->have('Synthesise\Lection', ['name' => 'Lection']);

        $I->have('Synthesise\Sequence', ['lection_name' => 'Lection', 'position' => 1]);

        $I->have('Synthesise\Cuepoint', ['id' => 1, 'sequence_id' => 1]);

        $I->have('Synthesise\Note', ['user_id' => 1, 'cuepoint_id' => 1, 'lection_name' => 'Lection', 'seminar_name' => 'Sample Seminar', 'note' => Crypt::encrypt('A note!')]);

        // Methode aufrufen
        Note::delete(1, 1, 'Lection', 'Sample Seminar', 1);

        // Testen, ob Notiz gelöscht wurde
        $I->dontSeeRecord('Synthesise\Note');
    }
}
