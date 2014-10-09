<?php
namespace Codeception\Module;

use \FunctionalTester;


// here you can define custom actions
// all public methods declared in helper class will be available in $I

class FunctionalHelper extends \Codeception\Module {

  /**
   * Als Student einloggen.
   *
   * @param     FunctionalTester $I
   */
  public function loggedInAsStudent(FunctionalTester $I)
  {
    $I->amOnPage('/login');
    $I->fillField('#username','studentka');
    $I->fillField('#password','Zelda');
    $I->click('Anmelden','#login');
  }

  /**
   * Als Mentor einloggen.
   *
   * @param     FunctionalTester $I
   */
  public function loggedInAsTeacher(FunctionalTester $I)
  {
    $I->amOnPage('/login');
    $I->fillField('#username','teacherka');
    $I->fillField('#password','Hyrule');
    $I->click('Anmelden','#login');
  }

  /**
   * Als Admin einloggen.
   *
   * @param     FunctionalTester $I
   */
  public function loggedInAsAdmin(FunctionalTester $I)
  {
    $I->amOnPage('/login');
    $I->fillField('#username','adminka');
    $I->fillField('#password','Link');
    $I->click('Anmelden','#login');
  }
}
