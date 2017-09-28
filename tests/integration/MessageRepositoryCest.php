<?php

class MessageRepositoryCest
{

    /**
     * Testet das Löschen einer Nachricht.
     */
    public function testDeleteMessages(IntegrationTester $I)
    {
        $I->wantTo('delete a Message');
      /*
       * Beispieldatensatz generieren
       *
       */
       $I->have('Synthesise\Message', ['id' => 1, 'content' => 'Das ist eine Nachricht.']);

      /*
       * Abfrage durchführen
       *
       */
      Message::delete(1);

      /*
       * Testergebnis auswerten
       *
       */
      $I->dontSeeRecord('Synthesise\Message', ['id' => 1]);
    }

    /**
     * Testet das Speichern aller Nachricthten.
     */
    public function testStoreMessages(IntegrationTester $I)
    {
        $I->wantTo('store a Message');

        /*
         * Abfrage durchführen
         *
         */
        Message::store('Neues Seminar', 'Neuer Titel', 'Eine neue Nachricht', 'yellow');

        /*
         * Testergebnis auswerten
         *
         */
        $I->seeRecord('Synthesise\Message', ['seminar_name' => 'Neues Seminar', 'title' => 'Neuer Titel', 'content' => 'Eine neue Nachricht', 'colour' => 'yellow']);
    }

    /**
     * Testet das Aktualisieren aller Nachricthten.
     */
    public function testUpdateMessages(IntegrationTester $I)
    {
        $I->wantTo('update a Message');
        /*
         * Beispieldatensatz generieren
         *
         */
        $I->have('Synthesise\Message', [
            'id' => 1,
            'title' => 'Das ist ein Titel',
            'content' => 'Das ist eine Nachricht.',
            'colour' => 'yellow'
        ]);

        /*
         * Abfrage durchführen
         *
         */
        Message::update(1, 'Titel Neu', 'Eine neue Nachricht', 'red');

        /*
         * Testergebnis auswerten
         *
         */
        $I->seeRecord('Synthesise\Message', ['id' => 1, 'title' => 'Titel Neu', 'content' => 'Eine neue Nachricht', 'colour' => 'red']);
    }
}
