<?php

class InfoblockRepositoryCest
{

    /**
     * Testet das Löschen eines Infoblocks.
     */
    public function testDeleteInfoblock(IntegrationTester $I)
    {
        $I->wantTo('delete an Infoblock');

        // Beispieldatensatz generieren
        $I->have('Synthesise\Infoblock', ['id' => 1]);

        // Infoblock löschen
        Infoblock::delete(1);

        // Abfrage durchführen
        $I->dontSeeRecord('Synthesise\Infoblock', ['id' => 1]);
    }

    /**
     * Testet das Speichern eines Infoblocks.
     */
    public function testStoreInfoblock(IntegrationTester $I)
    {
        $I->wantTo('store an Infoblock');

        // Speichern durchführen
        Infoblock::store('New Infoblock', 'Hello again.', 'http://link/url', NULL, NULL, 'Other Seminar');

        // Testergebnis auswerten
        $I->seeRecord('Synthesise\Infoblock', ['name' => 'New Infoblock']);
    }

    /**
     * Testet das Aktualisieren aller Nachricthten.
     */
    public function testUpdateInfoblock(IntegrationTester $I)
    {
        $I->wantTo('update an Infoblock');

        // Beispieldatensatz generieren
        $I->have('Synthesise\Infoblock', ['id' => 1, 'name' => 'Das ist ein Titel']);

        // Abfrage durchführen
        Infoblock::update(1, 'New Title', 'New content.', NULL, NULL, NULL, 'New Seminar');

        // Testergebnis auswerten
        $I->seeRecord('Synthesise\Infoblock', ['id' => 1, 'name' => 'New Title']);
    }
}
