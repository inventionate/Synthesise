<?php
use \UnitTester;

use Synthesise\Paper;

class PaperCest
{

  /**
   * Testet, ob ein Paper Objekt generiert werden kann.
   *
   */
  public function testCreateANewPaper(UnitTester $I)
  {
    $I->wantTo('create a new Paper');

    $I->canCreate('Paper');
  }

  /**
   * Testet, ob die Datenbankverknüpfuung Paper-Video definiert wurde
   *
   */
  public function testCheckVideoRelationship(UnitTester $I)
  {
    $I->wantTo('check if Paper belongs to Video');

    $paper = new Paper;
    $I->seeMethod($paper,'video');
  }

}
