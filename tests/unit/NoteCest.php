<?php

use Synthesise\Note;

class NoteCest
{
    /**
   * Testet, ob ein Note Objekt generiert werden kann.
   */
  public function createANewNote(UnitTester $I)
  {
      $I->wantTo('create a new Note');

      $I->canCreate('Note');
  }

  /**
   * Testet, ob die Datenbankverknüpfuung Note-Cuepoint definiert wurde.
   */
  public function checkIfBelongsToCuepointExits(UnitTester $I)
  {
      $I->wantTo('check if Note belongs to Cuepoint');

      $note = new Note();
      $I->seeMethod($note, 'cuepoint');
  }

  /**
   * Testet, ob die Datenbankverknüpfuung Note-User definiert wurde.
   */
  public function checkIfBelongsToUserExits(UnitTester $I)
  {
      $I->wantTo('check if Note belongs to User');

      $note = new Note();
      $I->seeMethod($note, 'user');
  }

  /**
   * Testet, ob die Datenbankverknüpfuung Note-Lection definiert wurde.
   */
  public function checkIfBelongsToLectionExits(UnitTester $I)
  {
      $I->wantTo('check if Note belongs to Lection');
      $note = new Note();
      $I->seeMethod($note, 'lection');
  }

  /**
   * Testet, ob die Datenbankverknüpfuung Note-Seminar definiert wurde.
   */
  public function checkIfBelongsToSeminarExits(UnitTester $I)
  {
      $I->wantTo('check if Note belongs to Seminar');
      $note = new Note();
      $I->seeMethod($note, 'seminar');
  }
}
