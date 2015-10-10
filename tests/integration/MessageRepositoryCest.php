<?php

use _data\Factories as Factories;

class MessageRepositoryCest
{
    /**
     * Eine fiktive Beispielfaq.
     *
     * @var array
     */
    protected $messageAttributes;

    /**
     * Bereitet die virtuelle Datenbank und virtuelle E-Mails vor.
     *
     * Migriert alle Strukturen in eine virtuelle SQLite Datenbank und
     * setzt die E-Mail auf 'pretend' um sie in der Logfile zu verzeichnen.
     */
    public function _before()
    {
        $this->messageAttributes = Factories::$messageAttributes;
    }

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
      $this->messageAttributes['id'] = 1;
        $this->messageAttributes['title'] = 'Test 1';
        $this->messageAttributes['content'] = 'Das ist eine Nachricht.';
        $I->haveRecord('messages', $this->messageAttributes);
        $this->messageAttributes['id'] = 2;
        $this->messageAttributes['title'] = 'Test 2';
        $this->messageAttributes['content'] = 'Das ist ein Integration Test!';
        $I->haveRecord('messages', $this->messageAttributes);

      /*
       * Abfrage durchführen
       *
       */
      $messages = Message::getAll();

      /*
       * Testergebnis auswerten
       *
       */
      $I->AssertEquals(2, count($messages));
    }

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
      $this->messageAttributes['id'] = 1;
        $this->messageAttributes['content'] = 'Das ist eine Nachricht.';
        $I->haveRecord('messages', $this->messageAttributes);
      /*
       * Abfrage durchführen
       *
       */
      Message::delete(1);

      /*
       * Testergebnis auswerten
       *
       */
      $I->dontSeeRecord('messages', ['id' => 1]);
    }

    /**
     * Testet das Speichern aller Nachricthten.
     */
    public function testStoreMessages(IntegrationTester $I)
    {
        $I->wantTo('store a Message');
      /*
       * Beispieldatensatz generieren
       *
       */
      $this->messageAttributes['id'] = 1;
        $this->messageAttributes['title'] = 'Das ist ein Titel';
        $this->messageAttributes['content'] = 'Das ist eine Nachricht.';
        $I->haveRecord('messages', $this->messageAttributes);
      /*
       * Abfrage durchführen
       *
       */
      Message::store('Neuer Titel', 'Eine neue Nachricht', 'yellow');
      /*
       * Testergebnis auswerten
       *
       */
      $I->seeRecord('messages', ['title' => 'Neuer Titel', 'content' => 'Eine neue Nachricht', 'colour' => 'yellow']);
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
      $this->messageAttributes['id'] = 1;
        $this->messageAttributes['title'] = 'Titel';
        $this->messageAttributes['content'] = 'Das ist eine Nachricht.';
        $this->messageAttributes['colour'] = 'green';
        $I->haveRecord('messages', $this->messageAttributes);
      /*
       * Abfrage durchführen
       *
       */
      Message::update(1, 'Titel Neu', 'Eine neue Nachricht', 'red');
      /*
       * Testergebnis auswerten
       *
       */
      $I->seeRecord('messages', ['id' => 1, 'title' => 'Titel Neu', 'content' => 'Eine neue Nachricht', 'colour' => 'red']);
    }
}
