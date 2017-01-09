<?php

use Synthesise\Seminar;

class SeminarCest
{
    /**
   * Testet, ob ein Section Objekt generiert werden kann.
   */
  public function createANewSeminar(UnitTester $I)
  {
      $I->wantTo('create a new Seminar');

      $I->canCreate('Seminar');
  }

  /**
   * Testet, ob die Datenbankverknüpfuung Seminar-Sections definiert wurde.
   */
  public function checkIfSectionsRelationshipExists(UnitTester $I)
  {
      $I->wantTo('check if Seminar has many Sections');

      $seminar = new Seminar();
      $I->seeMethod($seminar, 'sections');
  }

  /**
   * Testet, ob die Datenbankverknüpfuung Seminar-Users definiert wurde.
   */
  public function checkIfUsersRelationshipExists(UnitTester $I)
  {
      $I->wantTo('check if Seminar has many Users');

      $seminar = new Seminar();
      $I->seeMethod($seminar, 'users');
  }

  /**
   * Testet, ob die Datenbankverknüpfuung Seminar-Messages definiert wurde.
   */
  public function checkIfMessagesRelationshipExists(UnitTester $I)
  {
      $I->wantTo('check if Seminar has many Messages');

      $seminar = new Seminar();
      $I->seeMethod($seminar, 'messages');
  }

  /**
   * Testet, ob die Datenbankverknüpfuung Seminar-FAQs definiert wurde.
   */
  public function checkIfFaqsRelationshipExists(UnitTester $I)
  {
      $I->wantTo('check if Seminar has many Faqs');

      $seminar = new Seminar();
      $I->seeMethod($seminar, 'faqs');
  }

  /**
   * Testet, ob die Datenbankverknüpfuung Seminar-Infoblocks definiert wurde.
   */
  public function checkIfInfoblocksRelationshipExists(UnitTester $I)
  {
      $I->wantTo('check if Seminar has many Infoblocks');

      $seminar = new Seminar();
      $I->seeMethod($seminar, 'infoblocks');
  }

  /**
   * Testet, ob die Datenbankverknüpfuung Seminar-Notes definiert wurde.
   */
  public function checkIfNotesRelationshipExists(UnitTester $I)
  {
      $I->wantTo('check if Seminar has many Notes');

      $seminar = new Seminar();
      $I->seeMethod($seminar, 'notes');
  }
}
