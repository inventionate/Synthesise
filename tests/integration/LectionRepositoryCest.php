<?php

class LectionRepositoryCest
{

    /**
     * Testet das Abfragen aller Lektionen
     */
    public function testGetAllLections(IntegrationTester $I)
    {
        // Datensätze generieren
        $I->haveMultiple('Synthesise\Lection', 78);

        // Abfrage starten
        $count = Lection::getAll()->count();

        // Testergebnis auswerten
        $I->assertEquals($count, 78);
    }

    /**
     * Testet das Abfragen einer Lektion.
     */
    public function testGetLection(IntegrationTester $I)
    {
        // Datensätze generieren
        $I->have('Synthesise\Lection', ['name' => 'Intro']);
        $I->have('Synthesise\Lection', ['name' => 'Extro']);

        $I->have('Synthesise\Section', ['id' => 1, 'seminar_name' => 'Time Theory']);

        $I->haveRecord('lection_section', ['id' => 1, 'lection_name' => 'Intro', 'section_id' => 1, 'available_from' => '2014-09-17', 'available_to' => '2014-09-17']);

        $I->haveRecord('lection_section', ['id' => 2, 'lection_name' => 'Extro', 'section_id' => 1, 'available_from' => '2014-09-17', 'available_to' => '2014-09-17']);

        // Abfrage starten
        $lection = Lection::get('Intro', 'Time Theory');

        // Testergebnis auswerten
        $I->assertEquals($lection->first()->pivot->lection_name, 'Intro');
    }

    /**
     * Testet, ob die Lektione verfügbar ist.
     */
    public function testIfLectionIsAvailable(IntegrationTester $I)
    {
        // Datensätze generieren
        $I->have('Synthesise\Lection', ['name' => 'Intro']);

        $I->have('Synthesise\Section', ['id' => 1, 'seminar_name' => 'Time Theory']);

        $I->haveRecord('lection_section', ['id' => 1, 'lection_name' => 'Intro', 'section_id' => 1, 'available_from' => '2014-09-17', 'available_to' => '2014-09-17']);

        // Abfrage starten
        $available = Lection::available('Intro', 'Time Theory');

        // Testergebnis auswerten
        $I->assertFalse($available);
    }

    /**
     * Testet das Abrufen der Sektion.
     */
    public function testGetLectionSection(IntegrationTester $I)
    {
        // Datensätze generieren
        $I->have('Synthesise\Lection', ['name' => 'Intro']);

        $I->have('Synthesise\Section', ['id' => 1, 'name' => 'First Things', 'seminar_name' => 'Time Theory']);

        $I->haveRecord('lection_section', ['id' => 1, 'lection_name' => 'Intro', 'section_id' => 1, 'available_from' => '2014-09-17', 'available_to' => '2014-09-17']);

        // Abfrage starten
        $section = Lection::getSection('Intro', 'Time Theory');

        // Testergebnis auswerten
        $I->assertEquals($section, 'First Things');
    }

    /**
     * Testet das Abrufen der Anzahl an Sequenzen.
     */
    public function testGetLectionSequenceCount(IntegrationTester $I)
    {
        // Datensätze generieren
        $I->have('Synthesise\Lection', ['name' => 'Intro']);

        $I->haveMultiple('Synthesise\Sequence', 98, ['lection_name' => 'Intro']);

        // Abfrage starten
        $sequences = Lection::getSequenceCount('Intro');

        // Testergebnis auswerten
        $I->assertEquals($sequences, 98);
    }

    /**
     * Testet das Abrufen der Anzahl an Sequenzen ausgesprochen.
     */
    public function testGetLectionSequenceCountSpelled(IntegrationTester $I)
    {
        // Datensätze generieren
        $I->have('Synthesise\Lection', ['name' => 'Intro']);

        $I->haveMultiple('Synthesise\Sequence', 111, ['lection_name' => 'Intro']);

        // Abfrage starten
        $sequences = Lection::getSequenceCountSpelled('Intro');

        // Testergebnis auswerten
        $I->assertEquals($sequences, 'one hundred eleven');
    }

    /**
     * Testet das Abrufen aller Sequenzen.
     */
    public function testGetLectionSequences(IntegrationTester $I)
    {
        // Datensätze generieren
        $I->have('Synthesise\Lection', ['name' => 'Intro']);

        $I->haveMultiple('Synthesise\Sequence', 12, ['lection_name' => 'Intro']);

        // Abfrage starten
        $sequences = Lection::getSequences('Intro')->count();

        // Testergebnis auswerten
        $I->assertEquals($sequences, 12);
    }

    /**
     * Testet das Abrufen einer Sequenz.
     */
    public function testGetLectionSequence(IntegrationTester $I)
    {
        // Datensätze generieren
        $I->have('Synthesise\Lection', ['name' => 'Intro']);

        $I->have('Synthesise\Sequence', ['name' => 'Am Anfang', 'position' => 1, 'lection_name' => 'Intro']);

        // Abfrage starten
        $sequence = Lection::getSequence('Intro', 1);

        // Testergebnis auswerten
        $I->assertEquals($sequence->name, 'Am Anfang');
    }

    /**
     * Testet das Abrufen der Maker.
     */
    public function testGetLectionMarkers(IntegrationTester $I)
    {
        // Datensätze generieren
        $I->have('Synthesise\Lection', ['name' => 'Intro']);

        $I->have('Synthesise\Sequence', ['id' => 1, 'name' => 'Am Anfang', 'position' => 1, 'lection_name' => 'Intro']);

        $I->have('Synthesise\Cuepoint', ['cuepoint' => 1, 'content' => 'Hello!', 'sequence_id' => 1]);

        // Abfrage starten
        $markers = Lection::getMarkers('Intro', 1);

        // Testergebnis auswerten
        $I->assertEquals(json_decode($markers)[0]->text, 'Hello!');
    }

    /**
     * Testet das Abrufen des Bildpfads.
     */
    public function testGetLectionImagePath(IntegrationTester $I)
    {
        // Datensätze generieren
        $I->have('Synthesise\Lection', ['name' => 'Intro', 'image_path' => 'new/path/to/image']);

        // Abfrage starten
        $image_path = Lection::getImagePath('Intro');

        // Testergebnis auswerten
        $I->assertEquals($image_path, 'new/path/to/image');
    }

    /**
     * Testet das Abrufen des Textes.
     */
    public function testGetLectionPaper(IntegrationTester $I)
    {
        // Datensätze generieren
        $I->have('Synthesise\Lection', ['name' => 'Intro', 'image_path' => 'new/path/to/image']);

        $I->have('Synthesise\Paper', ['lection_name' => 'Intro', 'name' => 'Wie wir die soziale Welt machen']);

        // Abfrage starten
        $paper = Lection::getPaper('Intro');

        // Testergebnis auswerten
        $I->assertEquals($paper->name, 'Wie wir die soziale Welt machen');
    }

}
