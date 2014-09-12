<?php
use \UnitTester;

use Synthesise\User;
use Synthesise\Note;

class UserCest
{

  /**
   * Ein fiktiver Beispielnutzer.
   *
   * @var     array
   */
  protected $dummyUser;

  /**
   * Ein fiktiver Cuepoint.
   *
   * @var     array
   */
  protected $dummyCuepoint;

  /**
   * Eine fiktiver Notiz.
   *
   * @var     array
   */
  protected $dummyNote;

  /**
   * Bereitet die virtuelle Datenbank und virtuelle E-Mails vor.
   *
   * Migriert alle Strukturen in eine virtuelle SQLite Datenbank und
   * setzt die E-Mail auf 'pretend' um sie in der Logfile zu verzeichnen.
   *
   */
  public function _before()
  {
      TestCommons::prepareLaravel();
      $this->dummyUser = TestCommons::dummyUser();
      $this->dummyCuepoint = TestCommons::dummyCuepoint();
      $this->dummyNote = TestCommons::dummyNote();
  }

  /**
   * Testet ob ein User Objekt erzeugt werden kann.
   *
   */
  public function testCreateANewUser(UnitTester $I)
  {
      $I->wantTo('create a new user object');
      $I->canCreate('User');
  }

  /**
   * Testet das Suchen eines Nutzers anhand seines Nutzernamens.
   *
   */
  public function findUserByUsername(UnitTester $I)
  {
    $I->wantTo('find a user by username');

    // Beispieldatensatz generieren
    $this->dummyUser['username'] = 'otard';
    $this->dummyUser['firstname'] = 'Baron';
    $I->haveRecord('users', $this->dummyUser);

    // Methode aufrufen
    $user = User::findByUsername('otard');

    // Assert
    $I->AssertEquals($user->firstname,'Baron');
  }

	/**
   * Testet, ob die Datenbankverknüpfuung User-Note definiert wurde.
   *
   */
	public function checkHasManyNotes(UnitTester $I)
	{
    $I->wantTo('see if hasMay realtionship method exits');
    $user = new User;
    $I->seeMethod($user,'notes');
	}

	/**
	 * Testet die HTML Ausgabe gespeicherter Notizen.
	 *
	 */
	public function getNoteAsHTML(UnitTester $I)
	{
    $I->wantTo('create a HTML output of a note');
		// Beispieldatensatz generieren
    $this->dummyUser['id'] = 1;
    $I->haveRecord('users', $this->dummyUser);

    $this->dummyCuepoint['id'] = 1;
    $this->dummyCuepoint['content'] = 'Fähnchen 1';
    $this->dummyCuepoint['video_videoname'] = 'Sozialgeschichte 1';
    $I->haveRecord('cuepoints', $this->dummyCuepoint);

    $this->dummyNote['user_id'] = 1;
    $this->dummyNote['cuepoint_id'] = 1;
    $this->dummyNote['note'] = Crypt::encrypt('Erste Notiz.');
    $this->dummyNote['video_videoname'] = 'Sozialgeschichte 1';
    $I->haveRecord('notes', $this->dummyNote);

		// Methode aufrufen
		$usernotes = User::getAllNotes('1','Sozialgeschichte 1');

    $title = 'Notizen zu Sozialgeschichte 1';
    $content = '<h2>Fähnchen 1</h2><p>Erste Notiz.</p><h3 style="height:250px">Ergänzungen:</h3>';

		$html = Parser::htmlMarkup($title, $content);

    // Testen
		$I->AssertEquals($usernotes,$html);
	}

  /**
   * Testet die sortierte HTML Ausgabe mehrerer gespeicherten Notizen.
   *
   */
  public function getAllNotesOrderedAsHTML(UnitTester $I)
  {
    $I->wantTo('Get an ordered HTML output of all notes');

    // Beispieldatensatz generieren
    $this->dummyUser['id'] = 1;
    $I->haveRecord('users', $this->dummyUser);

    $this->dummyCuepoint['id'] = 1;
    $this->dummyCuepoint['content'] = 'Fähnchen 1';
    $this->dummyCuepoint['video_videoname'] = 'Sozialgeschichte 1';
    $I->haveRecord('cuepoints', $this->dummyCuepoint);
    $this->dummyCuepoint['id'] = 2;
    $this->dummyCuepoint['content'] = 'Fähnchen 2';
    $this->dummyCuepoint['video_videoname'] = 'Sozialgeschichte 1';
    $I->haveRecord('cuepoints', $this->dummyCuepoint);
    $this->dummyCuepoint['id'] = 3;
    $this->dummyCuepoint['content'] = 'Fähnchen 3';
    $this->dummyCuepoint['video_videoname'] = 'Sozialgeschichte 1';
    $I->haveRecord('cuepoints', $this->dummyCuepoint);

    $this->dummyNote['id'] = 1;
    $this->dummyNote['user_id'] = 1;
    $this->dummyNote['cuepoint_id'] = 1;
    $this->dummyNote['note'] = Crypt::encrypt('Erster Cuepoint.');
    $this->dummyNote['video_videoname'] = 'Sozialgeschichte 1';
    $I->haveRecord('notes', $this->dummyNote);
    $this->dummyNote['id'] = 2;
    $this->dummyNote['user_id'] = 1;
    $this->dummyNote['cuepoint_id'] = 3;
    $this->dummyNote['note'] = Crypt::encrypt('Dritter Cuepoint.');
    $this->dummyNote['video_videoname'] = 'Sozialgeschichte 1';
    $I->haveRecord('notes', $this->dummyNote);
    $this->dummyNote['id'] = 3;
    $this->dummyNote['user_id'] = 1;
    $this->dummyNote['cuepoint_id'] = 2;
    $this->dummyNote['note'] = Crypt::encrypt('Zweiter Cuepoint.');
    $this->dummyNote['video_videoname'] = 'Sozialgeschichte 1';
    $I->haveRecord('notes', $this->dummyNote);

    // Methode aufrufen
    $usernotes = User::getAllNotes('1','Sozialgeschichte 1');

    $title = 'Notizen zu Sozialgeschichte 1';
    $content = '<h2>Fähnchen 1</h2><p>Erster Cuepoint.</p><h3 style="height:250px">Ergänzungen:</h3><h2>Fähnchen 2</h2><p>Zweiter Cuepoint.</p><h3 style="height:250px">Ergänzungen:</h3><h2>Fähnchen 3</h2><p>Dritter Cuepoint.</p><h3 style="height:250px">Ergänzungen:</h3>';

    $html = Parser::htmlMarkup($title, $content);

    // Testen
    $I->AssertEquals($usernotes,$html);
  }

  /**
   * Testet die Abfrage des Nutzernamens.
   *
   */
	public function getUsername(UnitTester $I)
  {
    // ARRANGE
    $this->dummyUser['id'] = 1;
    $this->dummyUser['username'] = 'dark';
    $this->dummyUser['firstname'] = 'Darth';
    $this->dummyUser['lastname'] = 'Vader';
    $this->dummyUser['password'] = Hash::make('Deathstar');
    $I->haveRecord('users', $this->dummyUser);

    // Benutzer authentifizieren
    $I->amLoggedAs(['username' => 'dark', 'password' => 'Deathstar']);

		// ACT
		$username = User::getUsername();

		// ASSERT
		$I->AssertEquals($username, 'Darth Vader');
	}

  /**
   * Testet die Abfrage der E-Mail.
   *
   */
	public function getEmail(UnitTester $I)
  {
		$I->wantTo('get the e-mail of the authenticated user');

    // ARRANGE
    $this->dummyUser['id'] = 1;
    $this->dummyUser['username'] = 'dark01';
    $this->dummyUser['firstname'] = 'Darth';
    $this->dummyUser['lastname'] = 'Vader';
    $this->dummyUser['password'] = Hash::make('Deathstar');
    $I->haveRecord('users', $this->dummyUser);

    // Benutzer authentifizieren
    $I->amLoggedAs(['username' => 'dark01', 'password' => 'Deathstar']);

		// ACT
		$username = User::getEmail();

		// ASSERT
		$I->AssertEquals($username, 'dark01@ph-karlsruhe.de');
	}

}
