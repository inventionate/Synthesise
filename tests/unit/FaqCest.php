<?php

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
}
