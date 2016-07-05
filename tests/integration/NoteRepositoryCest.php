<?php

use Synthesise\Repositories\Facades\Note;
use Illuminate\Support\Facades\Crypt;
use _data\Factories as Factories;

class NoteRepositoryCest
{
    /**
     * Eine fiktive Beispielnotiz.
     *
     * @var array
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
        $this->noteAttributes = Factories::$noteAttributes;
    }

    /**
     * Testet, ob die Notiz ID ausgelesen werden kann.
     */
    public function test_find_note_id(IntegrationTester $I)
    {
        $I->wantTo('find Note ID');

      // Beispieldatensatz generieren
      $this->noteAttributes['user_id'] = 1;
        $this->noteAttributes['cuepoint_id'] = 1;
        $I->haveRecord('notes', $this->noteAttributes);

      // Methode aufrufen
      $noteId = Note::getNoteId(1, 1);

      // Testen
      $I->AssertEquals($noteId[0], 1);
    }

    /**
     * testet, ob der Inhalt einer Notiz ausgelesen werden kann.
     */
    public function test_read_note_content(IntegrationTester $I)
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
      $noteContent = Note::getContent(1, 2);

      // Testen
      $I->AssertEquals($noteContent, 'no side');
    }

    /**
     * Testet das Speichern einer neuen Notiz.
     */
    public function test_save_new_note(IntegrationTester $I)
    {
        $I->wantTo('save new Note');

      // Neue Notiz speichern
      $newNote = Note::updateContent('Der neue Inhalt.', 1, 1, 'Sozialgeschichte 1');

      // Notiz abfragen
      $noteContent = Note::getContent(1, 1);

      // Testen
      $I->AssertEquals($noteContent, 'Der neue Inhalt.');
    }

    /**
     * Testet das Updaten einer Notiz.
     */
    public function test_update_note_content(IntegrationTester $I)
    {
        $I->wantTo('update Note content');

      // Beispieldatensatz generieren
      $this->noteAttributes['note'] = Crypt::encrypt('Lightside');
        $this->noteAttributes['user_id'] = 1;
        $this->noteAttributes['cuepoint_id'] = 1;
        $this->noteAttributes['video_videoname'] = 'Sozialgeschichte 1';
        $I->haveRecord('notes', $this->noteAttributes);

      // Neue Notiz speichern
      $updatedNote = Note::updateContent('Der neue Inhalt.', 1, 1, 'Sozialgeschichte 1');

      // Notiz abfragen
      $noteContent = Note::getContent(1, 1);

      // Testen
      $I->AssertEquals($noteContent, 'Der neue Inhalt.');
    }

    /**
     * Testet das Löschen einer leeren Notiz.
     */
    public function test_remove_an_empty_note_from_database(IntegrationTester $I)
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
      $updatedNote = Note::updateContent('', 1, 1, 'Sozialgeschichte 1');

      // Testen
      $I->dontSeeRecord('notes', $this->noteAttributes);
    }
}
