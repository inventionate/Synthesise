<?php

class AuthCest
{
    /**
   * Bereitet die virtuelle Datenbank und virtuelle E-Mails vor
   * Migriert alle Strukturen in eine virtuelle SQLite Datenbank und
   * setzt die E-Mail auf 'pretend' um sie in der Logfile zu verzeichnen.
   */
  public function _before(FunctionalTester $I)
  {
      $I->seedDatabase($I);
      $I->dontSeeAuthentication();
  }

    public function _after(FunctionalTester $I)
    {
        $I->logout();
        $I->dontSeeAuthentication();
    }

    public function test_login_error(FunctionalTester $I)
    {
        $I->am('Student');
        $I->wantTo('get an username not existing error');

        $I->dontSeeRecord('users', ['username' => 'Luke']);

        $I->amOnPage('/login');
        $I->see('e:t:p:M', 'h1');
        $I->see('Login', 'h4');
        $I->fillField('#username', 'luke');
        $I->fillField('#password', 'pw');
        $I->click('Anmelden', '#login');

        $I->seeCurrentUrlEquals('/login');
        $I->seeElement('.error');
    }

    public function test_non_ldap_login(FunctionalTester $I)
    {
        $I->am('Student');
        $I->wantTo('login without ldap credentials');

        $I->seeRecord('users', ['username' => 'studentka']);

        $I->amOnPage('/login');
        $I->see('e:t:p:M', 'h1');
        $I->see('Login', 'h4');
        $I->fillField('#username', 'studentka');
        $I->fillField('#password', 'Zelda');
        $I->click('Anmelden', '#login');
        $I->seeAuthentication();

        $I->seeCurrentUrlEquals('');
        $I->see('Dashboard', 'h1');
    }
}
