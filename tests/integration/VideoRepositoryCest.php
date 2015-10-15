<?php

use _data\Factories as Factories;

class VideoRepositoryCest
{
    /**
   * Ein fiktives Beispielvideo.
   *
   * @var     array
   */
  protected $videoAttributes;

  /**
   * Ein fiktiver Beispieltext .
   *
   * @var     array
   */
  protected $paperAttributes;

  /**
   * Eine fiktive Beispielnotiz.
   *
   * @var     array
   */
  protected $noteAttributes;

  /**
   * Ein fiktiver Beispielcuepoint.
   *
   * @var     array
   */
  protected $cuepointAttributes;

  /**
   * Bereitet die virtuelle Datenbank und virtuelle E-Mails vor.
   *
   * Migriert alle Strukturen in eine virtuelle SQLite Datenbank und
   * setzt die E-Mail auf 'pretend' um sie in der Logfile zu verzeichnen.
   */
  public function _before()
  {
      $this->videoAttributes = Factories::$videoAttributes;
      $this->paperAttributes = Factories::$paperAttributes;
      $this->noteAttributes = Factories::$noteAttributes;
      $this->cuepointAttributes = Factories::$cuepointAttributes;
  }

  /**
   * Testet, ob ein freigeschaltetes Video verfügbar ist.
   */
  public function test_get_is_available(IntegrationTester $I)
  {
      $I->wantTo('get video is available');
      // Beispieldatensatz generieren
      $this->videoAttributes['videoname'] = 'Sozialgeschichte 1';
      $this->videoAttributes['available_from'] = '2000-01-01';
      $I->haveRecord('videos', $this->videoAttributes);

    // Methode ausführen
    $available = Video::available('Sozialgeschichte 1');

    // Testen
    $I->AssertTrue($available);
  }

  /**
   * Testet, ob ein nicht-freigeschaltetes Video nicht verfügbar ist.
   */
  public function test_get_is_not_available(IntegrationTester $I)
  {
      $I->wantTo('get video is not available');
      // Beispieldatensatz generieren
      $this->videoAttributes['videoname'] = 'Sozialgeschichte 1';
      $this->videoAttributes['available_from'] = '3000-01-01';
      $I->haveRecord('videos', $this->videoAttributes);

    // Methode ausführen
    $available = Video::available('Sozialgeschichte 1');

    // Testen
    $I->AssertFalse($available);
  }

  /**
   * Testet, ob das korrekte Veröffentlichungsdatum ausgelesen wird.
   */
  public function test_get_unlock_date(IntegrationTester $I)
  {
      $I->wantTo('get unlock date');
      // Beispieldatensatz generieren
      $this->videoAttributes['videoname'] = 'Sozialgeschichte 1';
      $this->videoAttributes['available_from'] = '0000-01-01';
      $I->haveRecord('videos', $this->videoAttributes);

    // Methode ausführen
    $unlockDate = Video::unlockDate('Sozialgeschichte 1');

    // Testen
    $I->AssertEquals($unlockDate, '0000-01-01');
  }

  /**
   * Testet das Auslesen des Auslesen des Datums bis zu dem das Video verfügbar ist.
   */
  public function test_get_final_date(IntegrationTester $I)
  {
      $I->wantTo('get final date');
      // Beispieldatensatz generieren
      $this->videoAttributes['videoname'] = 'Sozialgeschichte 1';
      $this->videoAttributes['available_to'] = '4000-01-03';
      $I->haveRecord('videos', $this->videoAttributes);

    // Methode ausführen
    $finalDate = Video::finalDate('Sozialgeschichte 1');

    // Testen
    $I->AssertEquals($finalDate, '4000-01-03');
  }

  /**
   * Testet das Auslesen des Datums bis zu dem das Video verfügbar ist.
   */
  public function test_get_section(IntegrationTester $I)
  {
      $I->wantTo('get section');
      // Beispieldatensatz generieren
      $this->videoAttributes['videoname'] = 'Sozialgeschichte 1';
      $this->videoAttributes['section'] = 'Geschichte';
      $I->haveRecord('videos', $this->videoAttributes);

    // Methode ausführen
    $section = Video::getSection('Sozialgeschichte 1');

    // Testen
    $I->AssertEquals($section, 'Geschichte');
  }

  /**
   * Testet das Auslesen der Texte zu einem Video.
   */
  public function test_get_papers(IntegrationTester $I)
  {
      $I->wantTo('get papers');
      // Beispieldatensatz generieren
      $this->videoAttributes['videoname'] = 'Sozialgeschichte 1';
      $I->haveRecord('videos', $this->videoAttributes);

      $this->paperAttributes['papername'] = 'Die Chronologie';
      $this->paperAttributes['video_videoname'] = 'Sozialgeschichte 1';
      $I->haveRecord('papers', $this->paperAttributes);

    // Methode ausführen
    $paper = Video::getPapers('Sozialgeschichte 1');

    // Testen
    $I->AssertEquals($paper->first()->pluck('papername'), 'Die Chronologie');
  }

  /**
   * Testet das Auslesen der Cuepoints eines Videos.
   */
  public function test_find_cuepoints(IntegrationTester $I)
  {
      $I->wantTo('find cuepoints');
      // Beispieldatensatz generieren
      $this->cuepointAttributes['id'] = 1;
      $this->cuepointAttributes['cuepoint'] = 10;
      $this->cuepointAttributes['video_videoname'] = 'Sozialgeschichte 1';
      $I->haveRecord('cuepoints', $this->cuepointAttributes);

      $this->cuepointAttributes['id'] = 2;
      $this->cuepointAttributes['cuepoint'] = 100;
      $this->cuepointAttributes['video_videoname'] = 'Sozialgeschichte 1';
      $I->haveRecord('cuepoints', $this->cuepointAttributes);

      $this->videoAttributes['videoname'] = 'Sozialgeschichte 1';
      $I->haveRecord('videos', $this->videoAttributes);

    // Methode ausführen
    $cuepoints = Video::getCuepoints('Sozialgeschichte 1', 1);

    // Testen
    $I->AssertEquals($cuepoints->first()->pluck('cuepoint'), 10);
  }

  /**
   * Testet das Auslesen der Cuepoints eines Videos.
   */
  public function test_find_first_cuepoint_id(IntegrationTester $I)
  {
      $I->wantTo('find first cuepoint id');
      // Beispieldatensatz generieren
      $this->cuepointAttributes['id'] = 1;
      $this->cuepointAttributes['cuepoint'] = 10;
      $this->cuepointAttributes['video_videoname'] = 'Sozialgeschichte 2';
      $I->haveRecord('cuepoints', $this->cuepointAttributes);

      $this->cuepointAttributes['id'] = 2;
      $this->cuepointAttributes['cuepoint'] = 200;
      $this->cuepointAttributes['video_videoname'] = 'Sozialgeschichte 2';
      $I->haveRecord('cuepoints', $this->cuepointAttributes);

      $this->cuepointAttributes['id'] = 3;
      $this->cuepointAttributes['cuepoint'] = 300;
      $this->cuepointAttributes['video_videoname'] = 'Sozialgeschichte 1';
      $I->haveRecord('cuepoints', $this->cuepointAttributes);

      $this->videoAttributes['id'] = 1;
      $this->videoAttributes['videoname'] = 'Sozialgeschichte 1';
      $I->haveRecord('videos', $this->videoAttributes);

      $this->videoAttributes['id'] = 2;
      $this->videoAttributes['videoname'] = 'Sozialgeschichte 2';
      $I->haveRecord('videos', $this->videoAttributes);

    // Methode ausführen
    $cuepoints = Video::getFirstCuepointId('Sozialgeschichte 1', 1);

    // Testen
    $I->AssertEquals($cuepoints, 3);
  }

  /**
   * Testet das Auslesen der Fähnchen eines Videos.
   */
  public function test_get_flagnames(IntegrationTester $I)
  {
      $I->wantTo('get flagnames');
      // Beispieldatensatz generieren
      $this->cuepointAttributes['id'] = 1;
      $this->cuepointAttributes['content'] = 'Fähnchen X';
      $this->cuepointAttributes['video_videoname'] = 'Sozialgeschichte 1';
      $I->haveRecord('cuepoints', $this->cuepointAttributes);

      $this->cuepointAttributes['id'] = 2;
      $this->cuepointAttributes['content'] = 'Fähnchen Y';
      $this->cuepointAttributes['video_videoname'] = 'Sozialgeschichte 1';
      $I->haveRecord('cuepoints', $this->cuepointAttributes);

      $this->videoAttributes['videoname'] = 'Sozialgeschichte 1';
      $I->haveRecord('videos', $this->videoAttributes);

    // Methode ausführen
    $flagnames = Video::getFlagnames('Sozialgeschichte 1', 1)->toArray();

    // Testen
    $I->AssertEquals($flagnames, ['Fähnchen X', 'Fähnchen Y']);
  }

  /**
   * Testet das Auslesen der Fähnchen eines Videos.
   *
   * @uses Parser::htmlMarkup um das HTML Markup zu generieren.
   */
  public function test_get_all_flagnames_as_html(IntegrationTester $I)
  {
      $I->wantTo('get all flagnames as html');
      // Beispieldatensatz generieren
      $this->cuepointAttributes['id'] = 1;
      $this->cuepointAttributes['content'] = 'Fähnchen X';
      $this->cuepointAttributes['video_videoname'] = 'Sozialgeschichte 1';
      $I->haveRecord('cuepoints', $this->cuepointAttributes);

      $this->cuepointAttributes['id'] = 2;
      $this->cuepointAttributes['content'] = 'Fähnchen Y';
      $this->cuepointAttributes['video_videoname'] = 'Sozialgeschichte 1';
      $I->haveRecord('cuepoints', $this->cuepointAttributes);

      $this->videoAttributes['videoname'] = 'Sozialgeschichte 1';
      $I->haveRecord('videos', $this->videoAttributes);

      // Methode ausführen
      $flagnames = Video::getAllFlagnamesAsHTML('Sozialgeschichte 1', 1);

      $htmlMarkup = Parser::htmlMarkup('Sozialgeschichte 1', '<h2 style="height:250px;">Fähnchen X</h2><h2 style="height:250px;">Fähnchen Y</h2>');

      // Testen
      $I->AssertEquals($flagnames, $htmlMarkup);
  }

  /**
   * Testet das Auslesen aller Videos.
   */
  public function test_get_videos(IntegrationTester $I)
  {
      $I->wantTo('get videos');
      // Beispieldatensatz generieren
      $this->videoAttributes['id'] = 1;
      $this->videoAttributes['videoname'] = 'Sozialgeschichte 1';
      $I->haveRecord('videos', $this->videoAttributes);

      $this->videoAttributes['id'] = 2;
      $this->videoAttributes['videoname'] = 'Sozialgeschichte 2';
      $I->haveRecord('videos', $this->videoAttributes);

      // Methode ausführen
      $videos = Video::getVideos();

      $videos = count($videos->toArray());

    // Testen
    $I->AssertEquals($videos, 2);
  }

  /**
   * Testet das Auslesen des aktuellen Videos.
   */
  public function test_get_current_video(IntegrationTester $I)
  {
      $I->wantTo('get current video');
      // Beispieldatensatz generieren
      $this->videoAttributes['id'] = 1;
      $this->videoAttributes['videoname'] = 'Star Wars: Die Rachde der Sith';
      $this->videoAttributes['available_from'] = date('Y-m-d', strtotime('+30 days'));
      $I->haveRecord('videos', $this->videoAttributes);

      $this->videoAttributes['id'] = 2;
      $this->videoAttributes['videoname'] = 'Star Wars: Die Rückkehr der Jediritter';
      $this->videoAttributes['available_from'] = date('Y-m-d', strtotime('-10 days'));
      $I->haveRecord('videos', $this->videoAttributes);

      $this->videoAttributes['id'] = 3;
      $this->videoAttributes['videoname'] = 'Star Wars: Eine neue Hoffnung';
      $this->videoAttributes['available_from'] = date('Y-m-d', strtotime('-1 days'));
      $I->haveRecord('videos', $this->videoAttributes);

      $this->videoAttributes['id'] = 4;
      $this->videoAttributes['videoname'] = 'Star Wars: Eine dunkle Bedrohung';
      $this->videoAttributes['available_from'] = date('Y-m-d', strtotime('+70 days'));
      $I->haveRecord('videos', $this->videoAttributes);

    // Methode ausführen
    $video = Video::getCurrentVideo();

    // Testen
    $I->AssertEquals($video->videoname, 'Star Wars: Eine neue Hoffnung');
  }

  /**
   * Testet die Ausgabe wenn kein Video verfügbar ist.
   */
  public function test_get_false_if_there_is_no_current_video(IntegrationTester $I)
  {
      $I->wantTo('get false if there is no current video');
      // Methode ausführen
    $video = Video::getCurrentVideo();

    // Testen
    $I->AssertFalse($video);
  }

  /**
   * Testet, ob ein Video online verfügbar ist.
   */
  public function test_get_online(IntegrationTester $I)
  {
      $I->wantTo('get online');
      // Beispieldatensatz generieren
      $this->videoAttributes['id'] = 1;
      $this->videoAttributes['videoname'] = 'Star Wars: Die Rachde der Sith';
      $this->videoAttributes['online'] = 1;
      $I->haveRecord('videos', $this->videoAttributes);

      $this->videoAttributes['id'] = 2;
      $this->videoAttributes['videoname'] = 'Star Wars: Die Rückkehr der Jediritter';
      $this->videoAttributes['online'] = 0;
      $I->haveRecord('videos', $this->videoAttributes);

      $this->videoAttributes['id'] = 3;
      $this->videoAttributes['videoname'] = 'Star Wars: Eine neue Hoffnung';
      $this->videoAttributes['online'] = 1;
      $I->haveRecord('videos', $this->videoAttributes);

      $this->videoAttributes['id'] = 4;
      $this->videoAttributes['videoname'] = 'Star Wars: Eine dunkle Bedrohung';
      $this->videoAttributes['online'] = 0;
      $I->haveRecord('videos', $this->videoAttributes);

    // Methode ausführen
    $online = Video::getOnline('Star Wars: Die Rachde der Sith');

    // Testen
    $I->AssertEquals($online, true);
  }
}
