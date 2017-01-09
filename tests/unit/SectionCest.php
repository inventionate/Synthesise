<?php

use Synthesise\Section;

class SectionCest
{
    /**
   * Testet, ob ein Section Objekt generiert werden kann.
   */
  public function createANewSection(UnitTester $I)
  {
      $I->wantTo('create a new Section');

      $I->canCreate('Section');
  }

  /**
   * Testet, ob die Datenbankverknüpfuung Section-Seminar definiert wurde.
   */
  public function checkIfSeminarRelationshipExists(UnitTester $I)
  {
      $I->wantTo('check if Section belongs to Seminar');

      $section = new Section();
      $I->seeMethod($section, 'seminar');
  }

  /**
   * Testet, ob die Datenbankverknüpfuung Section-Lections definiert wurde.
   */
  public function checkIfLectionsRelationshipExists(UnitTester $I)
  {
      $I->wantTo('check if Section belongs to many Lections');

      $section = new Section();
      $I->seeMethod($section, 'lections');
  }
}
