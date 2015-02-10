<?php
namespace Codeception\Module;

use \FunctionalTester;

// here you can define custom actions
// all public methods declared in helper class will be available in $I

class FunctionalHelper extends \Codeception\Module {

  private $Data;

  public function __construct()
  {
      $this->Data = New \TestDatabaseSeeder();
  }

  /**
   * Als Student einloggen.
   *
   * @param     FunctionalTester $I
   */
  public function loggedInAsStudent(FunctionalTester $I)
  {
    $I->amOnPage('/auth/login');
    $I->fillField('#username','studentka');
    $I->fillField('#password','Zelda');
    $I->dontSeeAuthentication();
    $I->click('Anmelden','#login');
    $I->seeAuthentication();
  }

  /**
   * Als Mentor einloggen.
   *
   * @param     FunctionalTester $I
   */
  public function loggedInAsTeacher(FunctionalTester $I)
  {
    $I->amOnPage('/auth/login');
    $I->fillField('#username','teacherka');
    $I->fillField('#password','Hyrule');
    $I->dontSeeAuthentication();
    $I->click('Anmelden','#login');
    $I->seeAuthentication();
  }

  /**
   * Als Admin einloggen.
   *
   * @param     FunctionalTester $I
   */
  public function loggedInAsAdmin(FunctionalTester $I)
  {
    $I->amOnPage('/auth/login');
    $I->fillField('#username','adminka');
    $I->fillField('#password','Link');
    $I->dontSeeAuthentication();
    $I->click('Anmelden','#login');
    $I->seeAuthentication();
  }

  /**
   * Beispieldatensätze generien.
   *
   * @param     FunctionalTester $I
   */
  public function seedDatabase(FunctionalTester $I)
  {
    $this->Data->seedCuepoints($I);
    $this->Data->seedFaqs($I);
  }

}
