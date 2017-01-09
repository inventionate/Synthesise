<?php

use Synthesise\Lection;

class LectionCest
{
    /**
   * Testet ob ein Lection Objekt erzeugt werden kann.
   */
  public function testCreateANewLection(UnitTester $I)
  {
      $I->wantTo('create a new Lection');

      $I->canCreate('Lection');
  }

  /**
   * Testet, ob die Datenbankverknüpfuung Lection-Paper definiert wurde.
   */
  public function checkIfHasOnePaperExits(UnitTester $I)
  {
      $I->wantTo('check if Lection has one Paper');

      $lection = new Lection();
      $I->seeMethod($lection, 'paper');
  }

  /**
   * Testet, ob die Datenbankverknüpfuung Lection-Sequences definiert wurde.
   */
  public function testCheckIfHasManySequencesExits(UnitTester $I)
  {
      $I->wantTo('check if Lection has many Sequences');

      $lection = new Lection();
      $I->seeMethod($lection, 'sequences');
  }

  /**
   * Testet, ob die Datenbankverknüpfuung Lection-Sections definiert wurde.
   */
  public function testCheckIfbelongsToManySectionsExist(UnitTester $I)
  {
      $I->wantTo('check if Lection belongs to many Sections');

      $lection = new Lection();
      $I->seeMethod($lection, 'sections');
  }
}
