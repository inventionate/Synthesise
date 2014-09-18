<?php
use \FunctionalTester;

class DashboardCest {

  /**
   * Bereitet die virtuelle Datenbank und virtuelle E-Mails vor
   * Migriert alle Strukturen in eine virtuelle SQLite Datenbank und
   * setzt die E-Mail auf 'pretend' um sie in der Logfile zu verzeichnen.
   * Danach wird der Standardaccount für Studenten eingeloggt.
   *
   */
  public function _before(FunctionalTester $I)
  {
    TestCommons::prepareLaravel();
    TestCommons::dbSeed();
  }

  public function seeDashboardPartials(FunctionalTester $I)
	{
	  $I->am('Student');
	  $I->wantTo('see dashboard partials');

    $I->loggedInAsStudent($I);

		$I->amOnPage('/dashboard');
		$I->see('Aktuelle online-Lektion','h2');
		$I->see('Allgemeine Informationen','h2');
		$I->see('Ablaufplan','h2');
	}

	/**
	 * @group Student
	 */
  public function seeStudentDashboard(FunctionalTester $I)
  {
	  $I->am('Student');
	  $I->wantTo('see student dashboard');

    $I->loggedInAsStudent($I);

		$I->amOnPage('/dashboard');
		$I->see('Dashboard','h1');
    $I->dontsee('Sie haben erweiterte Benutzerrechte und können die online-Lektionen bereits früher verwenden.','div');
  }

  public function seeStudentTable(FunctionalTester $I)
  {
    $I->am('Student');
    $I->wantTo('see student table');

    $I->loggedInAsStudent($I);

    $I->amOnPage('/dashboard');
    $I->see('Ablaufplan','h2');
    $I->see('Themenbereich','th');
    $I->see('online-Lektion','th');
    $I->see('Zugänglich ab','th');
    $I->dontsee('Studentenzugang','th');
    $I->dontsee('Status','th');
    $I->see('Literatur & Notizen','th');
  }

  /**
   * @group Teacher
   */
  public function seeTeacherDashboard(FunctionalTester $I)
  {
    $I->am('Teacher');
    $I->wantTo('see teacher dashboard');

    $I->loggedInAsTeacher($I);

    $I->amOnPage('/dashboard');
    $I->see('Sie haben erweiterte Benutzerrechte und können die online-Lektionen bereits früher verwenden.','div');
  }

  public function seeTeacherTableExtraContent(FunctionalTester $I)
  {
    $I->am('Teacher');
    $I->wantTo('see teacher table');

    $I->loggedInAsTeacher($I);

    $I->amOnPage('/dashboard');
		$I->see('Ablaufplan','h2');
		$I->see('Themenbereich','th');
		$I->see('online-Lektion','th');
		$I->see('Studierendenzugang','th');
		$I->see('Literatur & Notizen','th');
  }
}
