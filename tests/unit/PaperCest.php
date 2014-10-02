<?php
use \UnitTester;

use Synthesise\Paper;

class PaperCest
{

  /**
   * Testet, ob ein Paper Objekt generiert werden kann.
   *
   */
  public function createANewPaper(UnitTester $I)
  {
    $I->canCreate('Paper');
  }

  /**
   * Testet, ob die Datenbankverknüpfuung Paper-Video definiert wurde
   *
   */
  public function checkVideoRelationship(UnitTester $I)
  {
    $paper = new Paper;
    $I->seeMethod($paper,'video');
  }

}
