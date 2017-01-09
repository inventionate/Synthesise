<?php

use Synthesise\Faq as FAQ;

class FaqCest
{
    /**
   * Testet, ob ein FAQ Objekt generiert werden kann.
   */
  public function testCreateANewFaq(UnitTester $I)
  {
      $I->wantTo('create a new FAQ');

      $I->canCreate('Faq');
  }

  /**
   * Testet, ob die Datenbankverknüpfuung FAQ-Seminar definiert wurde.
   */
  public function checkBelongsToSeminar(UnitTester $I)
  {
      $faq = new FAQ();
      $I->seeMethod($faq, 'seminar');
  }
}
