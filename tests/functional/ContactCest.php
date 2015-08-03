<?php

use \FunctionalTester;

class ContactCest
{
    /**
   * Bereitet die virtuelle Datenbank und virtuelle E-Mails vor
   * Migriert alle Strukturen in eine virtuelle SQLite Datenbank und
   * setzt die E-Mail auf 'pretend' um sie in der Logfile zu verzeichnen.
   * Danach wird der Standardaccount für Studenten eingeloggt.
   */
  public function _before(FunctionalTester $I)
  {
      $I->seedDatabase($I);
      $I->dontSeeAuthentication();
      $I->loggedInAsStudent($I);
  }

    public function _after(FunctionalTester $I)
    {
        $I->seeAuthentication();
        $I->logout();
        $I->dontSeeAuthentication();
    }

    public function test_see_feedback_info(FunctionalTester $I)
    {
        $I->am('Student');
        $I->wantTo('see feedback info');

        $I->amOnPage('/kontakt');
        $I->see('Bei Fragen zur Gestaltung der Gesamtveranstaltung nutzen Sie bitte dieses Formular. Die Nachricht wird direkt an Timo Hoyer gesendet. Er wird Ihnen eine Antwort an Ihre E-Mail Adresse der Pädagogischen Hochschule Karlsruhe senden.', 'p');
        $I->see('Bei technischen Problemen nutzen Sie bitte dieses Formular. Die Nachricht wird direkt an Fabian Mundt gesendet. Er wird Ihnen eine Antwort an Ihre E-Mail Adresse der Pädagogischen Hochschule Karlsruhe senden.', 'p');
        $I->see('Bei Verständnisfragen wenden Sie sich bitte direkt an die jeweiligen Dozenten:', 'p');
    }

    public function test_send_general_question(FunctionalTester $I)
    {
        $I->am('Student');
        $I->wantTo('send a general question');

        $I->amOnPage('/kontakt');
        $I->seeElement('#feedback');
        $I->fillField('#feedbackMessage', 'Test.');
        $I->click('Abschicken', '#feedback');
        $I->see('Ihre Nachricht wurde erfolgreich gesendet.');
    }

    public function test_send_support_question(FunctionalTester $I)
    {
        $I->am('Student');
        $I->wantTo('send a support question');

        $I->amOnPage('/kontakt');
        $I->fillField('#supportMessage', 'Test.');
        $I->click('Abschicken', '#support');
        $I->see('Ihre Nachricht wurde erfolgreich gesendet.');
    }

    public function test_cant_send_empty_general_question(FunctionalTester $I)
    {
        $I->am('Student');
        $I->wantTo('get an general question sending error because the message is empty');

        $I->amOnPage('/kontakt');
        $I->fillField('#feedbackMessage', '');
        $I->click('Abschicken', '#feedback');
        $I->see('Bitte geben Sie eine Nachricht ein.');
    }

    public function test_cant_send_empty_support_question(FunctionalTester $I)
    {
        $I->am('Student');
        $I->wantTo('get an support question sending error because the message is empty');

        $I->amOnPage('/kontakt');
        $I->fillField('#supportMessage', '');
        $I->click('Abschicken', '#support');
        $I->see('Bitte geben Sie eine Nachricht ein.');
    }
}
