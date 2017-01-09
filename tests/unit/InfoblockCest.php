<?php

use Synthesise\Infoblock;

class InfoblockCest
{
    /**
   * Testet, ob ein Message Objekt generiert werden kann.
   */
  public function testCreateANewInfoblockInstance(UnitTester $I)
  {
      $I->wantTo('create a new Infoblock instance');

      $I->canCreate('Infoblock');
  }

  /**
   * Testet, ob die Datenbankverknüpfuung Infoblock-Seminar definiert wurde.
   */
  public function checkBelongsToSeminar(UnitTester $I)
  {
      $infoblock = new Infoblock();
      $I->seeMethod($infoblock, 'seminar');
  }
}
