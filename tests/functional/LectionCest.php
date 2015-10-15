<?php

class LectionCest
{
    /**
    * Bereitet die virtuelle Datenbank und virtuelle E-Mails vor
    * Migriert alle Strukturen in eine virtuelle SQLite Datenbank und
    * setzt die E-Mail auf 'pretend' um sie in der Logfile zu verzeichnen.
    * Danach wird der Standardaccount für Studenten eingeloggt.
    */
   public function _before(FunctionalTester $I)
   {
       $I->seedDatabase($I);
       $I->dontSeeAuthentication();
       $I->loggedInAsStudent($I);
   }

    public function _after(FunctionalTester $I)
    {
        $I->seeAuthentication();
        $I->logout();
        $I->dontSeeAuthentication();
    }

    public function test_load_cuepoints(FunctionalTester $I)
    {
        $I->am('Student');
        $I->wantTo('see online-lecture cuepoints');

        $I->amOnPage('/online-lektionen/Sozialgeschichte%201/1');
        $I->seeElement('interactive-video', ['markers' => '[{"time":"100","text":"F\u00e4hnchen 1"},{"time":"300","text":"F\u00e4hnchen 2"},{"time":"700","text":"F\u00e4hnchen 3"}]']);
    }

    public function test_load_flags(FunctionalTester $I)
    {
        $I->am('Student');
        $I->wantTo('see online-lecture flags');

        $I->amOnPage('/online-lektionen/Sozialgeschichte%201/1');
        $I->sendAjaxGetRequest('/online-lektionen/Sozialgeschichte%201/1/getflags');
        $I->seeElement('interactive-video', ['markers' => '[{"time":"100","text":"F\u00e4hnchen 1"},{"time":"300","text":"F\u00e4hnchen 2"},{"time":"700","text":"F\u00e4hnchen 3"}]']);
    }

    public function test_change_cuepoint(FunctionalTester $I)
    {
        $I->am('Student');
        $I->wantTo('see different notes');

      // Ersten Note ansehen
      $I->amOnPage('/online-lektionen/Sozialgeschichte%201/1');
        $I->sendAjaxGetRequest('/online-lektionen/Sozialgeschichte%201/1/getnotes', ['cuepointNumber' => 'marker-1']);
        $I->see('Das ist die ERSTE Notiz.');

    // Zweiten Note ansehen
    $I->sendAjaxGetRequest('/online-lektionen/Sozialgeschichte%201/1/getnotes', ['cuepointNumber' => 'marker-2']);
        $I->see('Das ist die ZWEITE Notiz.');
    }

    public function test_load_notes(FunctionalTester $I)
    {
        $I->am('Student');
        $I->wantTo('see my notes');

        $I->amOnPage('/online-lektionen/Sozialgeschichte%201/1');
        $I->sendAjaxGetRequest('/online-lektionen/Sozialgeschichte%201/1/getnotes', ['cuepointNumber' => 'marker-1']);
        $I->see('Das ist die ERSTE Notiz.');
    }

    public function test_update_note(FunctionalTester $I)
    {
        $I->am('Student');
        $I->wantTo('update a note');

        // Note öffnen
        $I->amOnPage('/online-lektionen/Sozialgeschichte%201/1');
        $I->sendAjaxGetRequest('/online-lektionen/Sozialgeschichte%201/1/getnotes', ['cuepointNumber' => 'marker-1']);
        $I->see('Das ist die ERSTE Notiz.');

        // Token abfragen
        $token = $I->grabAttributeFrom(['name' => 'csrf-token'], 'content');

        // Note verändern
        $I->sendAjaxPostRequest('/online-lektionen/Sozialgeschichte%201/1/postnotes', ['note' => 'Das ist die VERAENDERTE Notiz.', 'cuepointNumber' => 'marker-1', '_token' => $token]);

        // Veränderte Note ansehen
        $I->sendAjaxGetRequest('/online-lektionen/Sozialgeschichte%201/1/getnotes', ['cuepointNumber' => 'marker-1']);
        $I->see('Das ist die VERAENDERTE Notiz.');
    }

    public function test_load_video(FunctionalTester $I)
    {
        $I->am('Student');
        $I->wantTo('see online-lecture title');

        $I->amOnPage('/online-lektionen/Sozialgeschichte%201/1');
        $I->seeElement('interactive-video');

        $I->seeElement('interactive-video', ['name' => 'Sozialgeschichte 1']);
        $I->seeElement('interactive-video', ['path' => '/video/sozialgeschichte_1_1']);
    }

    public function test_generate_text_download_button(FunctionalTester $I)
    {
        $I->am('Student');
        $I->wantTo('see the video associated papers');

        $I->amOnPage('/online-lektionen/Sozialgeschichte%201/1/');
        $I->see('Fabian Mundt: Zeit-Raum Studium!');
    }
}
