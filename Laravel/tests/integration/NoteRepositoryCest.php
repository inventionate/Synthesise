<?php
use \IntegrationTester;

use Synthesise\Repositories\Facades\Note;
use Illuminate\Support\Facades\Crypt;

class NoteRepositoryCest
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
     * Testet, ob die Notiz ID ausgelesen werden kann.
     *
     */
    public function findNoteId(IntegrationTester $I)
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
    public function readNoteContent(IntegrationTester $I)
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
    public function saveNewNote(IntegrationTester $I)
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
    public function updateNoteContent(IntegrationTester $I)
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
    public function removeAnEmptyNoteFromDatabase(IntegrationTester $I)
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
      $note = Synthesise\Note::find(1);

      // Testen
      $I->AssertEmpty($note);
    }

}
