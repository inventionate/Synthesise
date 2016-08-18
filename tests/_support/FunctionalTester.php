<?php


/**
 * Inherited Methods.
 *
 * @method void wantToTest($text)
 * @method void wantTo($text)
 * @method void execute($callable)
 * @method void expectTo($prediction)
 * @method void expect($prediction)
 * @method void amGoingTo($argumentation)
 * @method void am($role)
 * @method void lookForwardTo($achieveValue)
 * @method void comment($description)
 * @method \Codeception\Lib\Friend haveFriend($name, $actorClass = null)
 *
 * @SuppressWarnings(PHPMD)
 */
class FunctionalTester extends \Codeception\Actor
{
    use _generated\FunctionalTesterActions;

  /**
   * Als Student einloggen.
   *
   * @param     FunctionalTester $I
   */
  public function loggedInAsStudent()
  {
      $this->amOnPage('/login');
      $this->fillField('#username', 'studentka');
      $this->fillField('#password', 'Zelda');
      $this->dontSeeAuthentication();
      $this->click('Anmelden', '#login');
      $this->seeAuthentication();
  }

  /**
   * Als Mentor einloggen.
   *
   * @param     FunctionalTester $I
   */
  public function loggedInAsTeacher()
  {
      $this->amOnPage('/login');
      $this->fillField('#username', 'teacherka');
      $this->fillField('#password', 'Hyrule');
      $this->dontSeeAuthentication();
      $this->click('Anmelden', '#login');
      $this->seeAuthentication();
  }

  /**
   * Als Admin einloggen.
   *
   * @param     FunctionalTester $I
   */
  public function loggedInAsAdmin()
  {
      $this->amOnPage('/login');
      $this->fillField('#username', 'adminka');
      $this->fillField('#password', 'Link');
      $this->dontSeeAuthentication();
      $this->click('Anmelden', '#login');
      $this->seeAuthentication();
  }
}
