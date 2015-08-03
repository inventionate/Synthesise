<?php

use \IntegrationTester;
use _data\Factories as Factories;

class UserRepositoryCest
{
    /**
   * Ein fiktiver Beispielnutzer.
   *
   * @var     array
   */
  protected $userAttributes;

  /**
   * Ein fiktiver Cuepoint.
   *
   * @var     array
   */
  protected $cuepointAttributes;

  /**
   * Eine fiktiver Notiz.
   *
   * @var     array
   */
  protected $noteAttributes;

  /**
   * Bereitet die virtuelle Datenbank und virtuelle E-Mails vor.
   *
   * Migriert alle Strukturen in eine virtuelle SQLite Datenbank und
   * setzt die E-Mail auf 'pretend' um sie in der Logfile zu verzeichnen.
   */
  public function _before()
  {
      $this->userAttributes = Factories::$userAttributes;
      $this->cuepointAttributes = Factories::$cuepointAttributes;
      $this->noteAttributes = Factories::$noteAttributes;
  }

  /**
   * Testet das Suchen eines Nutzers anhand seines Nutzernamens.
   */
  public function test_find_user_by_username(IntegrationTester $I)
  {
      $I->wantTo('find a user by username');

    // Beispieldatensatz generieren
    $this->userAttributes['username'] = 'otard';
      $this->userAttributes['firstname'] = 'Baron';
      $I->haveRecord('users', $this->userAttributes);

    // Methode aufrufen
    $user = User::findByUsername('otard');

    // Assert
    $I->AssertEquals($user->firstname, 'Baron');
  }

  /**
   * Testet die HTML Ausgabe gespeicherter Notizen.
   */
  public function testGetNoteAsHTML(IntegrationTester $I)
  {
      $I->wantTo('create a HTML output of a note');
    // Beispieldatensatz generieren
    $this->userAttributes['id'] = 1;
      $I->haveRecord('users', $this->userAttributes);

      $this->cuepointAttributes['id'] = 1;
      $this->cuepointAttributes['content'] = 'Fähnchen 1';
      $this->cuepointAttributes['video_videoname'] = 'Sozialgeschichte 1';
      $I->haveRecord('cuepoints', $this->cuepointAttributes);

      $this->noteAttributes['user_id'] = 1;
      $this->noteAttributes['cuepoint_id'] = 1;
      $this->noteAttributes['note'] = Crypt::encrypt('Erste Notiz.');
      $this->noteAttributes['video_videoname'] = 'Sozialgeschichte 1';
      $I->haveRecord('notes', $this->noteAttributes);

    // Methode aufrufen
    $usernotes = User::getAllNotes('1', 'Sozialgeschichte 1');

      $title = 'Notizen zu Sozialgeschichte 1';
      $content = '<h2>Fähnchen 1</h2><p>Erste Notiz.</p><h3 style="height:250px">Ergänzungen:</h3>';

      $html = Parser::htmlMarkup($title, $content);

    // Testen
    $I->AssertEquals($usernotes, $html);
  }

  /**
   * Testet die sortierte HTML Ausgabe mehrerer gespeicherten Notizen.
   */
  public function testGetAllNotesOrderedAsHTML(IntegrationTester $I)
  {
      $I->wantTo('Get an ordered HTML output of all notes');

    // Beispieldatensatz generieren
    $this->userAttributes['id'] = 1;
      $I->haveRecord('users', $this->userAttributes);

      $this->cuepointAttributes['id'] = 1;
      $this->cuepointAttributes['content'] = 'Fähnchen 1';
      $this->cuepointAttributes['video_videoname'] = 'Sozialgeschichte 1';
      $I->haveRecord('cuepoints', $this->cuepointAttributes);
      $this->cuepointAttributes['id'] = 2;
      $this->cuepointAttributes['content'] = 'Fähnchen 2';
      $this->cuepointAttributes['video_videoname'] = 'Sozialgeschichte 1';
      $I->haveRecord('cuepoints', $this->cuepointAttributes);
      $this->cuepointAttributes['id'] = 3;
      $this->cuepointAttributes['content'] = 'Fähnchen 3';
      $this->cuepointAttributes['video_videoname'] = 'Sozialgeschichte 1';
      $I->haveRecord('cuepoints', $this->cuepointAttributes);

      $this->noteAttributes['id'] = 1;
      $this->noteAttributes['user_id'] = 1;
      $this->noteAttributes['cuepoint_id'] = 1;
      $this->noteAttributes['note'] = Crypt::encrypt('Erster Cuepoint.');
      $this->noteAttributes['video_videoname'] = 'Sozialgeschichte 1';
      $I->haveRecord('notes', $this->noteAttributes);
      $this->noteAttributes['id'] = 2;
      $this->noteAttributes['user_id'] = 1;
      $this->noteAttributes['cuepoint_id'] = 3;
      $this->noteAttributes['note'] = Crypt::encrypt('Dritter Cuepoint.');
      $this->noteAttributes['video_videoname'] = 'Sozialgeschichte 1';
      $I->haveRecord('notes', $this->noteAttributes);
      $this->noteAttributes['id'] = 3;
      $this->noteAttributes['user_id'] = 1;
      $this->noteAttributes['cuepoint_id'] = 2;
      $this->noteAttributes['note'] = Crypt::encrypt('Zweiter Cuepoint.');
      $this->noteAttributes['video_videoname'] = 'Sozialgeschichte 1';
      $I->haveRecord('notes', $this->noteAttributes);

    // Methode aufrufen
    $usernotes = User::getAllNotes('1', 'Sozialgeschichte 1');

      $title = 'Notizen zu Sozialgeschichte 1';
      $content = '<h2>Fähnchen 1</h2><p>Erster Cuepoint.</p><h3 style="height:250px">Ergänzungen:</h3><h2>Fähnchen 2</h2><p>Zweiter Cuepoint.</p><h3 style="height:250px">Ergänzungen:</h3><h2>Fähnchen 3</h2><p>Dritter Cuepoint.</p><h3 style="height:250px">Ergänzungen:</h3>';

      $html = Parser::htmlMarkup($title, $content);

    // Testen
    $I->AssertEquals($usernotes, $html);
  }

  /**
   * Testet die Abfrage des Nutzernamens.
   */
  public function testGetUsername(IntegrationTester $I)
  {
      $I->wantTo('get username of authenticated user');

    // ARRANGE
    $this->userAttributes['id'] = 1;
      $this->userAttributes['username'] = 'dark';
      $this->userAttributes['firstname'] = 'Darth';
      $this->userAttributes['lastname'] = 'Vader';
      $this->userAttributes['password'] = Hash::make('Deathstar');
      $I->haveRecord('users', $this->userAttributes);

    // Benutzer authentifizieren
    $I->dontSeeAuthentication();
      $I->amLoggedAs(['username' => 'dark', 'password' => 'Deathstar']);
      $I->seeAuthentication();

    // ACT
    $username = User::getUsername();

    // ASSERT
    $I->AssertEquals($username, 'Darth Vader');

      $I->logout();
      $I->dontSeeAuthentication();
  }

  /**
   * Testet die Abfrage der E-Mail.
   */
  public function testGetEmail(IntegrationTester $I)
  {
      $I->wantTo('get the e-mail of the authenticated user');

    // ARRANGE
    $this->userAttributes['id'] = 1;
      $this->userAttributes['username'] = 'dark01ka';
      $this->userAttributes['firstname'] = 'Darth';
      $this->userAttributes['lastname'] = 'Vader';
      $this->userAttributes['password'] = Hash::make('Deathstar');
      $I->haveRecord('users', $this->userAttributes);

    // Benutzer authentifizieren
    $I->dontSeeAuthentication();
      $I->amLoggedAs(['username' => 'dark01ka', 'password' => 'Deathstar']);
      $I->seeAuthentication();

    // ACT
    $username = User::getEmail();

    // ASSERT
    $I->AssertEquals($username, 'dark01@ph-karlsruhe.de');

      $I->logout();
      $I->dontSeeAuthentication();
  }
}
