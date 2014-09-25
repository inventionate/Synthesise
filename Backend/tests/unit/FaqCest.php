<?php
use \UnitTester;

class FaqCest {

  /**
   * Testet, ob ein FAQ Objekt generiert werden kann.
   *
   */
  public function createANewFaq(UnitTester $I)
  {
      $I->canCreate('Faq');
  }

  /**
   * Test, ob die Anfangsbuchtaben (area) abgefragt werden können
   *
   */

}
