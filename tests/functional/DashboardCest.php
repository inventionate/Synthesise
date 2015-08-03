<?php

class DashboardCest
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
   }

    public function _after(FunctionalTester $I)
    {
        $I->seeAuthentication();
        $I->logout();
        $I->dontSeeAuthentication();
    }

    public function test_see_dashboard_partials(FunctionalTester $I)
    {
        $I->am('Student');
        $I->wantTo('see dashboard partials');

        $I->loggedInAsStudent($I);

        $I->amOnPage('/');
        $I->see('Aktuelle online-Lektion', 'h2');
        $I->see('Allgemeine Informationen', 'h2');
        $I->see('Ablaufplan', 'h2');
    }

  /**
   * @group Student
   */
  public function test_see_student_dashboard(FunctionalTester $I)
  {
      $I->am('Student');
      $I->wantTo('see student dashboard');

      $I->loggedInAsStudent($I);

      $I->amOnPage('/');
      $I->see('Dashboard', 'h1');
      $I->dontsee('Sie haben erweiterte Benutzerrechte und können die online-Lektionen bereits früher verwenden.', 'div');
  }

    public function test_see_student_table(FunctionalTester $I)
    {
        $I->am('Student');
        $I->wantTo('see Student table');

        $I->loggedInAsStudent($I);

        $I->amOnPage('/');
        $I->see('Ablaufplan', 'h2');
        $I->see('Themenbereich', 'th');
        $I->see('online-Lektion', 'th');
        $I->see('Zugänglich ab', 'th');
        $I->dontsee('Studentenzugang', 'th');
        $I->dontsee('Status', 'th');
        $I->see('Literatur & Notizen', 'th');
    }

  /**
   * @group Teacher
   */
  public function test_see_teacher_dashboard(FunctionalTester $I)
  {
      $I->am('Teacher');
      $I->wantTo('see teacher dashboard');

      $I->loggedInAsTeacher($I);

      $I->amOnPage('/');
      $I->see('Teacher', 'div.right.item a.ui.button');
  }

    public function test_see_teacher_table_extra_content(FunctionalTester $I)
    {
        $I->am('Teacher');
        $I->wantTo('see Teacher table');

        $I->loggedInAsTeacher($I);

        $I->amOnPage('/');
        $I->see('Ablaufplan', 'h2');
        $I->see('Themenbereich', 'th');
        $I->see('online-Lektion', 'th');
        $I->see('Studierendenzugang', 'th');
        $I->see('Literatur & Notizen', 'th');
    }

  /**
   * @group Admin
   */
  public function test_see_admin_dashboard(FunctionalTester $I)
  {
      $I->am('Teacher');
      $I->wantTo('see Admin dashboard');

      $I->loggedInAsAdmin($I);

      $I->amOnPage('/');
      $I->see('Admin', 'div.right.item a.ui.button');
  }
}
