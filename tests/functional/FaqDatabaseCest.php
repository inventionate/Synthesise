<?php

class FaqDatabaseCest
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

    public function test_see_faq_start_page(FunctionalTester $I)
    {
        $I->am('Student');
        $I->wantTo('see FAQ start test');

        $I->amOnPage('/hgf');
        $I->see('Häufig gestellte Fragen', 'h1');
        $I->see('Bitte wählen Sie einen Fragebereich aus. Sollte sich Ihre Frage nach der Lektüre der hier aufgelisteten Antworten nicht geklärt haben, wenden Sie sich bitte direkt an uns. Wir versuchen den »Häufig gestellte Fragen« Katalog ständig zu erweitern und freuen und über Ihre Anregungen und Mitarbeit.', 'p');
        $I->seeElement('.pagination');
    }

    public function test_see_answers_for_a(FunctionalTester $I)
    {
        $I->am('Student');
        $I->wantTo('see Answers for A');

        $I->amOnPage('/hgf/A');
        $I->seeElement('#faq-accordion');
        $I->see('Anwesenheit');
    }
}
