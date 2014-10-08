<?php
use \FunctionalTester;

class LectionCest {

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
    $I->loggedInAsStudent($I);
  }

  public function loadCuepoints(FunctionalTester $I)
	{
	  $I->am('Student');
	  $I->wantTo('see online-lecture cuepoints');

	  $I->amOnPage('/online-lektionen/Sozialgeschichte%201');
	  $I->seeElement('.flowplayer');

	  $I->see('data-cuepoints="[100,300,700]"');
  }

  public function loadFlags(FunctionalTester $I)
  {
	  $I->am('Student');
	  $I->wantTo('see online-lecture flags');

	  $I->amOnPage('/online-lektionen/Sozialgeschichte%201');
	  $I->sendAjaxGetRequest('/online-lektionen/Sozialgeschichte%201/getflags');
	  $I->see('["F\u00e4hnchen 1","F\u00e4hnchen 2","F\u00e4hchen 3"]');
  }

  public function changeCuepoint(FunctionalTester $I)
  {
    $I->am('Student');
    $I->wantTo('see different notes');

	  // Ersten Note ansehen
	  $I->amOnPage('/online-lektionen/Sozialgeschichte%201');
	  $I->sendAjaxGetRequest('/online-lektionen/Sozialgeschichte%201/getnotes', ['cuepointNumber' => 'fp-cuepoint fp-cuepoint0']);
	  $I->see('Das ist die ERSTE Notiz.');

    // Zweiten Note ansehen
    $I->sendAjaxGetRequest('/online-lektionen/Sozialgeschichte%201/getnotes', ['cuepointNumber' => 'fp-cuepoint fp-cuepoint1']);
	  $I->see('Das ist die ZWEITE Notiz.');
  }

  public function loadNotes(FunctionalTester $I)
  {
		$I->am('Student');
		$I->wantTo('see my notes');


		$I->amOnPage('/online-lektionen/Sozialgeschichte%201');
		$I->sendAjaxGetRequest('/online-lektionen/Sozialgeschichte%201/getnotes',['cuepointNumber' => 'fp-cuepoint fp-cuepoint0']);
		$I->see('Das ist die ERSTE Notiz.');
	}

	public function updateNote(FunctionalTester $I)
	{
		$I->am('Student');
		$I->wantTo('update a note');

		// Note öffnen
		$I->amOnPage('/online-lektionen/Sozialgeschichte%201');
		$I->sendAjaxGetRequest('/online-lektionen/Sozialgeschichte%201/getnotes', ['cuepointNumber' => 'fp-cuepoint fp-cuepoint0']);
		$I->see('Das ist die ERSTE Notiz.');

    $token = $I->grabValueFrom('#videoplayer.col-md-12 section#notes form input');
		// Note verändern
		$I->sendAjaxPostRequest('/online-lektionen/Sozialgeschichte%201/postnotes',
    ['note' => 'Das ist die VERAENDERTE Notiz.', 'cuepointNumber' => 'fp-cuepoint fp-cuepoint0',
    '_token' => $token]);

    // <input type="hidden" value="N2ghZAMrlljXbh9pGwylHA0b2H6W0cMm91GPadbx" name="_token">

		// Veränderte Note ansehen
		$I->sendAjaxGetRequest('/online-lektionen/Sozialgeschichte%201/getnotes', ['cuepointNumber' => 'fp-cuepoint fp-cuepoint0']);
		$I->see('Das ist die VERAENDERTE Notiz.');
	}

	public function loadVideo(FunctionalTester $I)
	{
		$I->am('Student');
		$I->wantTo('see online-lecture title');

		$I->amOnPage('/online-lektionen/Sozialgeschichte%201');
		$I->seeElement('.flowplayer');

		$I->see('title="Sozialgeschichte 1"');
	}

	public function generateTextDownloadButton(FunctionalTester $I)
	{
		$I->am('Student');
		$I->wantTo('see the video associated papers');

		$I->amOnPage('/online-lektionen/Sozialgeschichte%201');
		$I->see('Fabian Mundt: Zeit-Raum Studium!');
	}
}
