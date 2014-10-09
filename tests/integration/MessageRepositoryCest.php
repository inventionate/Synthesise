<?php
use \IntegrationTester;

class MessageRepositoryCest {

    /**
     * Eine fiktive Beispielfaq.
     *
     * @var     array
     */
    protected $dummyMessage;

    /**
     * Bereitet die virtuelle Datenbank und virtuelle E-Mails vor
     *
     * Migriert alle Strukturen in eine virtuelle SQLite Datenbank und
     * setzt die E-Mail auf 'pretend' um sie in der Logfile zu verzeichnen.
     *
     */
    public function _before()
    {
      TestCommons::prepareLaravel();
      $this->dummyMessage = TestCommons::dummyMessage();
    }


    /**
     * Testet die Abfrage aller Nachrichten.
     *
     */
    public function testGetAllMessages(IntegrationTester $I)
    {
      $I->wantTo('get all Messages');
      /**
       * Beispieldatensatz generieren
       *
       */
      $this->dummyMessage['id'] = 1;
      $this->dummyMessage['message'] = 'Das ist eine Nachricht.';
      $this->dummyMessage['type'] = 'info';
      $I->haveRecord('messages', $this->dummyMessage);
      $this->dummyMessage['id'] = 2;
      $this->dummyMessage['message'] = 'Das ist ein Integration Test!';
      $this->dummyMessage['type'] = 'danger';
      $I->haveRecord('messages', $this->dummyMessage);

      /**
       * Abfrage durchführen
       *
       */
      $messages = Message::getAll();

      /**
       * Testergebnis auswerten
       *
       */
      $I->AssertEquals(2, count($messages));

    }

    /**
     * Testet das Löschen einer Nachricht.
     *
     */
    public function testDeleteMessages(IntegrationTester $I)
    {
      $I->wantTo('delete a Message');
      /**
       * Beispieldatensatz generieren
       *
       */
      $this->dummyMessage['id'] = 1;
      $this->dummyMessage['message'] = 'Das ist eine Nachricht.';
      $this->dummyMessage['type'] = 'info';
      $I->haveRecord('messages',$this->dummyMessage);
      /**
       * Abfrage durchführen
       *
       */
      Message::delete(1);
      /**
       * Testergebnis auswerten
       *
       */
      $I->dontSeeRecord('messages',['id' => 1]);
    }

    /**
     * Testet das Speichern aller Nachricthten.
     *
     */
    public function testStoreMessages(IntegrationTester $I)
    {
      $I->wantTo('store a Message');
      /**
       * Beispieldatensatz generieren
       *
       */
      $this->dummyMessage['id'] = 1;
      $this->dummyMessage['message'] = 'Das ist eine Nachricht.';
      $this->dummyMessage['type'] = 'info';
      $I->haveRecord('messages',$this->dummyMessage);
      /**
       * Abfrage durchführen
       *
       */
      Message::store('Eine neue Nachricht','warning');
      /**
       * Testergebnis auswerten
       *
       */
      $I->seeRecord('messages',['id' => 2, 'message' => 'Eine neue Nachricht', 'type' => 'warning']);
    }

    /**
     * Testet das Aktualisieren aller Nachricthten.
     *
     */
    public function testUpdateMessages(IntegrationTester $I)
    {
      $I->wantTo('update a Message');
      /**
       * Beispieldatensatz generieren
       *
       */
      $this->dummyMessage['id'] = 1;
      $this->dummyMessage['message'] = 'Das ist eine Nachricht.';
      $this->dummyMessage['type'] = 'info';
      $I->haveRecord('messages',$this->dummyMessage);
      /**
       * Abfrage durchführen
       *
       */
      Message::update(1, 'Eine neue Nachricht','danger');
      /**
       * Testergebnis auswerten
       *
       */
      $I->seeRecord('messages',['id' => 1, 'message' => 'Eine neue Nachricht', 'type' => 'danger']);
    }
}
