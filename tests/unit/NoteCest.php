<?php

use Synthesise\Note;

class NoteCest
{
    /**
   * Testet, ob ein Note Objekt generiert werden kann.
   */
  public function testCreateANewNote(UnitTester $I)
  {
      $I->wantTo('create a new Note');

      $I->canCreate('Note');
  }

  /**
   * Testet, ob die Datenbankverknüpfuung Note-Cuepoint definiert wurde.
   */
  public function testCheckIfBelongsToCuepointExits(UnitTester $I)
  {
      $I->wantTo('check if Note belongs to Cuepoint');

      $note = new Note();
      $I->seeMethod($note, 'cuepoint');
  }

  /**
   * Testet, ob die Datenbankverknüpfuung Note-User definiert wurde.
   */
  public function testCheckIfBelongsToUserExits(UnitTester $I)
  {
      $I->wantTo('check if Note belongs to User');

      $note = new Note();
      $I->seeMethod($note, 'user');
  }

  /**
   * Testet, ob die Datenbankverknüpfuung Note-Video definiert wurde.
   */
  public function testCheckIfBelongsToPaperExits(UnitTester $I)
  {
      $I->wantTo('check if Note belongs to Video');
      $note = new Note();
      $I->seeMethod($note, 'video');
  }
}
