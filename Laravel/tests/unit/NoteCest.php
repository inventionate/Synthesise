<?php
use \UnitTester;

use Synthesise\Note;

class NoteCest
{
  /**
   * Testet, ob ein Note Objekt generiert werden kann.
   *
   */
  public function createANewNote(UnitTester $I)
  {
    $I->canCreate('Note');
  }

  /**
   * Testet, ob die Datenbankverknüpfuung Note-Cuepoint definiert wurde.
   *
   */
  public function checkIfBelongsToCuepointExits(UnitTester $I)
  {
    $note = new Note;
    $I->seeMethod($note,'cuepoint');
  }

  /**
   * Testet, ob die Datenbankverknüpfuung Note-User definiert wurde.
   *
   */
  public function checkIfBelongsToUserExits(UnitTester $I)
  {
    $note = new Note;
    $I->seeMethod($note,'user');
  }

  /**
   * Testet, ob die Datenbankverknüpfuung Note-Video definiert wurde.
   *
   */
  public function checkIfBelongsToPaperExits(UnitTester $I)
  {
      $note = new Note;
      $I->seeMethod($note,'video');
  }

}
