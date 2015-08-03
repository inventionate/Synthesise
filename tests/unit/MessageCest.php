<?php

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
}
