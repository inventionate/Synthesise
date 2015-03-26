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
    protected $noteAttributes;

    /**
     * Bereitet die virtuelle Datenbank und virtuelle E-Mails vor.
     *
     * Migriert alle Strukturen in eine virtuelle SQLite Datenbank und
     * setzt die E-Mail auf 'pretend' um sie in der Logfile zu verzeichnen.
     *
     */
    public function _before()
    {
      $this->noteAttributes = TestCommons::$noteAttributes;
    }

    /**
     * Testet, ob die Notiz ID ausgelesen werden kann.
     *
     */
    public function testFindNoteId(IntegrationTester $I)
    {
      $I->wantTo('find Note ID');

      // Beispieldatensatz generieren
      $this->noteAttributes['user_id'] = 1;
      $this->noteAttributes['cuepoint_id'] = 1;
      $I->haveRecord('notes', $this->noteAttributes);

      // Methode aufrufen
      $noteId = Note::getNoteId(1,1);

      // Testen
      $I->AssertEquals($noteId, 1);
    }

    /**
     * testet, ob der Inhalt einer Notiz ausgelesen werden kann.
     *
     */
    public function testReadNoteContent(IntegrationTester $I)
    {
      $I->wantTo('read Note content');

      // Beispieldatensatz generieren
      $this->noteAttributes['id'] = 1;
      $this->noteAttributes['note'] = Crypt::encrypt('Darkside');
      $this->noteAttributes['user_id'] = 1;
      $this->noteAttributes['cuepoint_id'] = 1;
      $I->haveRecord('notes', $this->noteAttributes);
      $this->noteAttributes['id'] = 2;
      $this->noteAttributes['note'] = Crypt::encrypt('Lightside');
      $this->noteAttributes['user_id'] = 2;
      $this->noteAttributes['cuepoint_id'] = 1;
      $I->haveRecord('notes', $this->noteAttributes);
      $this->noteAttributes['id'] = 3;
      $this->noteAttributes['note'] = Crypt::encrypt('no side');
      $this->noteAttributes['user_id'] = 1;
      $this->noteAttributes['cuepoint_id'] = 2;
      $I->haveRecord('notes', $this->noteAttributes);

      // Methode aufrufen
      $noteContent = Note::getContent(1,2);

      // Testen
      $I->AssertEquals($noteContent, 'no side');
    }

    /**
     * Testet das Speichern einer neuen Notiz.
     *
     */
    public function testSaveNewNote(IntegrationTester $I)
    {
      $I->wantTo('save new Note');

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
    public function testUpdateNoteContent(IntegrationTester $I)
    {
      $I->wantTo('update Note content');

      // Beispieldatensatz generieren
      $this->noteAttributes['note'] = Crypt::encrypt('Lightside');
      $this->noteAttributes['user_id'] = 1;
      $this->noteAttributes['cuepoint_id'] = 1;
      $this->noteAttributes['video_videoname'] = 'Sozialgeschichte 1';
      $I->haveRecord('notes', $this->noteAttributes);

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
    public function testRemoveAnEmptyNoteFromDatabase(IntegrationTester $I)
    {
      $I->wantTo('remove an empty Note from database');

      // Beispieldatensatz generieren
      $this->noteAttributes['id'] = 1;
      $this->noteAttributes['note'] = Crypt::encrypt('Lightside');
      $this->noteAttributes['user_id'] = 1;
      $this->noteAttributes['cuepoint_id'] = 1;
      $this->noteAttributes['video_videoname'] = 'Sozialgeschichte 1';
      $I->haveRecord('notes', $this->noteAttributes);

      // Neue Notiz speichern
      $updatedNote = Note::updateContent('',1,1,'Sozialgeschichte 1');

      // Notiz abfragen
      $note = Synthesise\Note::find(1);

      // Testen
      $I->AssertEmpty($note);
    }

}
