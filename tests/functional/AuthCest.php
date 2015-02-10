<?php
use \FunctionalTester;

class AuthCest {

  /**
   * Bereitet die virtuelle Datenbank und virtuelle E-Mails vor
   * Migriert alle Strukturen in eine virtuelle SQLite Datenbank und
   * setzt die E-Mail auf 'pretend' um sie in der Logfile zu verzeichnen.
   *
   */
  public function _before(FunctionalTester $I)
  {
    $I->seedDatabase($I);
    $I->dontSeeAuthentication();
  }

  public function _after(FunctionTester $I)
  {
    $I->seeAuthentication();
    $I->logout();
    $I->dontSeeAuthentication();
  }

  public function testLoginError(FunctionalTester $I)
  {
    $I->am('Student');
    $I->wantTo('get an username not existing error');

    $I->dontSeeRecord('users', ['username' => 'Luke']);

    $I->amOnPage('/auth/login');
    $I->see('e:t:p:M','h1');
    $I->see('Login','h3');
    $I->fillField('#username','luke');
    $I->fillField('#password','pw');
    $I->click('Anmelden','#login');
    $I->seeAuthentication();

    $I->seeCurrentUrlEquals('/auth/login');
    $I->seeElement('.form-group.has-error');
  }

  public function testNonLdapLogin(FunctionalTester $I)
  {
    $I->am('Student');
    $I->wantTo('login without ldap credentials');

    $I->seeRecord('users', ['username' => 'studentka']);

    $I->amOnPage('/auth/login');
    $I->see('e:t:p:M','h1');
    $I->see('Login','h3');
    $I->fillField('#username','studentka');
    $I->fillField('#password','Zelda');
    $I->click('Anmelden','#login');
    $I->seeAuthentication();

    $I->seeCurrentUrlEquals('');
    $I->see('Dashboard','h1');
  }

}
