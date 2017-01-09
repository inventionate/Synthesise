<?php

use Synthesise\Sequence;

class SequenceCest
{
    /**
   * Testet, ob ein Sequence Objekt generiert werden kann.
   */
  public function createANewSequence(UnitTester $I)
  {
      $I->wantTo('create a new Sequence');

      $I->canCreate('Sequence');
  }

  /**
   * Testet, ob die Datenbankverknüpfuung Sequence-Cuepoints definiert wurde.
   */
  public function checkIfCuepointsRelationshipExists(UnitTester $I)
  {
      $I->wantTo('check if Sequence has many Cuepoints');

      $sequence = new Sequence();
      $I->seeMethod($sequence, 'cuepoints');
  }

  /**
   * Testet, ob die Datenbankverknüpfuung Sequence-Lection definiert wurde.
   */
  public function checkIfLectionRelationshipExists(UnitTester $I)
  {
      $I->wantTo('check if Sequence belongs to Lection');

      $sequence = new Sequence();
      $I->seeMethod($sequence, 'lection');
  }
}
