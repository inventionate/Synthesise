<?php
use \UnitTester;

use Synthesise\Note;
use Illuminate\Support\Facades\Crypt;

class NoteCest
{

  /**
   * Eine fiktive Beispielnotiz.
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
    $this->dummyNote = TestCommons::dummyNote();
  }

  /**
   * Testet, ob ein Note Objekt generiert werden kann.
   *
   */
  public function createANewNote(UnitTester $I)
  {
    $I->canCreate('Note');
  }

  /**
   * Testet, ob die Datenbankverknüpfuung Note-Cuepoint definiert wurde.
   *
   */
  public function checkIfBelongsToCuepointExits(UnitTester $I)
  {
    $note = new Note;
    $I->seeMethod($note,'cuepoint');
  }

  /**
   * Testet, ob die Datenbankverknüpfuung Note-User definiert wurde.
   *
   */
  public function checkIfBelongsToUserExits(UnitTester $I)
  {
    $note = new Note;
    $I->seeMethod($note,'user');
  }

  /**
   * Testet, ob die Datenbankverknüpfuung Note-Video definiert wurde.
   *
   */
  public function checkIfBelongsToPaperExits(UnitTester $I)
  {
      $note = new Note;
      $I->seeMethod($note,'video');
  }

	/**
	 * Testet, ob die Notiz ID ausgelesen werden kann.
	 *
	 */
	public function findNoteId(UnitTester $I)
	{
		// Beispieldatensatz generieren
		$this->dummyNote['user_id'] = 1;
    $this->dummyNote['cuepoint_id'] = 1;
    $I->haveRecord('notes', $this->dummyNote);

		// Methode aufrufen
		$noteId = Note::getNoteId(1,1);

		// Testen
		$I->AssertEquals($noteId, 1);
	}

  /**
   * testet, ob der Inhalt einer Notiz ausgelesen werden kann.
   *
   */
	public function readNoteContent(UnitTester $I)
	{
		// Beispieldatensatz generieren
    $this->dummyNote['id'] = 1;
    $this->dummyNote['note'] = Crypt::encrypt('Darkside');
    $this->dummyNote['user_id'] = 1;
    $this->dummyNote['cuepoint_id'] = 1;
    $I->haveRecord('notes', $this->dummyNote);
    $this->dummyNote['id'] = 2;
    $this->dummyNote['note'] = Crypt::encrypt('Lightside');
    $this->dummyNote['user_id'] = 2;
    $this->dummyNote['cuepoint_id'] = 1;
    $I->haveRecord('notes', $this->dummyNote);
    $this->dummyNote['id'] = 3;
    $this->dummyNote['note'] = Crypt::encrypt('no side');
    $this->dummyNote['user_id'] = 1;
    $this->dummyNote['cuepoint_id'] = 2;
    $I->haveRecord('notes', $this->dummyNote);

		// Methode aufrufen
		$noteContent = Note::getContent(1,2);

		// Testen
		$I->AssertEquals($noteContent, 'no side');
	}

	/**
   * Testet das Speichern einer neuen Notiz.
   *
   */
	public function saveNewNote(UnitTester $I)
	{
		// Neue Notiz speichern
		$newNote = Note::updateContent('Der neue Inhalt.',1,1,'Sozialgeschichte 1');

		// Notiz abfragen
		$noteContent = Note::getContent(1,1);

		// Testen
		$I->AssertEquals($noteContent, 'Der neue Inhalt.');
	}

	/**
	 * Testet das Updaten einer Notiz.
	 *
	 */
	public function updateNoteContent(UnitTester $I)
	{
		// Beispieldatensatz generieren
		$this->dummyNote['note'] = Crypt::encrypt('Lightside');
    $this->dummyNote['user_id'] = 1;
    $this->dummyNote['cuepoint_id'] = 1;
    $this->dummyNote['video_videoname'] = 'Sozialgeschichte 1';
    $I->haveRecord('notes', $this->dummyNote);

		// Neue Notiz speichern
		$updatedNote = Note::updateContent('Der neue Inhalt.',1,1,'Sozialgeschichte 1');

		// Notiz abfragen
		$noteContent = Note::getContent(1,1);

		// Testen
		$I->AssertEquals($noteContent, 'Der neue Inhalt.');
	}

  /**
   * Testet das Löschen einer leeren Notiz.
   *
   */
	public function removeAnEmptyNoteFromDatabase(UnitTester $I)
	{
		// Beispieldatensatz generieren
    $this->dummyNote['id'] = 1;
    $this->dummyNote['note'] = Crypt::encrypt('Lightside');
    $this->dummyNote['user_id'] = 1;
    $this->dummyNote['cuepoint_id'] = 1;
    $this->dummyNote['video_videoname'] = 'Sozialgeschichte 1';
    $I->haveRecord('notes', $this->dummyNote);

		// Neue Notiz speichern
		$updatedNote = Note::updateContent('',1,1,'Sozialgeschichte 1');

		// Notiz abfragen
		$note = Note::find(1);

		// Testen
		$I->AssertEmpty($note);
	}

}
