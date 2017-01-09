<?php

use Synthesise\Paper;

class PaperCest
{
    /**
   * Testet, ob ein Paper Objekt generiert werden kann.
   */
  public function createANewPaper(UnitTester $I)
  {
      $I->wantTo('create a new Paper');

      $I->canCreate('Paper');
  }

  /**
   * Testet, ob die Datenbankverknüpfuung Paper-Lection definiert wurde.
   */
  public function checkIfLectionRelationshipExists(UnitTester $I)
  {
      $I->wantTo('check if Paper belongs to Lection');

      $paper = new Paper();
      $I->seeMethod($paper, 'lection');
  }
}
