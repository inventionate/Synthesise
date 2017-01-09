<?php

use Synthesise\Message;

class MessageCest
{
    /**
   * Testet, ob ein Message Objekt generiert werden kann.
   */
  public function testCreateANewMessageInstance(UnitTester $I)
  {
      $I->wantTo('create a new Message instance');

      $I->canCreate('Message');
  }

  /**
   * Testet, ob die Datenbankverknüpfuung Message-Seminar definiert wurde.
   */
  public function testCheckIfbelongsToSeminarExist(UnitTester $I)
  {
      $I->wantTo('check if Message belongs to Seminar');

      $message = new Message();
      $I->seeMethod($message, 'seminar');
  }
}
