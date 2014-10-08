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
}
