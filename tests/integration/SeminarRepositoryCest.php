<?php

class SeminarRepositoryCest {

    /**
     * Testet die Abfrage aller Nachrichten.
     */
    public function testGetAllMessages(IntegrationTester $I)
    {
        $I->wantTo('get all Messages');
      /*
       * Beispieldatensatz generieren
       *
       */
      $I->have('Synthesise\Seminar', ['name' => 'Raum und Zeit']);

      $I->haveMultiple('Synthesise\Message', 10, ['seminar_name' => 'Raum und Zeit']);

      $I->haveMultiple('Synthesise\Message', 100, ['seminar_name' => 'Raum und Mensch']);

      /*
       * Abfrage durchführen
       *
       */
       $messages = Seminar::getAllMessages('Raum und Zeit');

      /*
       * Testergebnis auswerten
       *
       */
      $I->AssertEquals(count($messages), 10);
    }

}
