<?php
use \UnitTester;

class VideoCest
{

  /**
   * Ein fiktives Beispielvideo.
   *
   * @var     array
   */
  protected $dummyVideo;

  /**
   * Ein fiktiver Beispieltext .
   *
   * @var     array
   */
  protected $dummyPaper;

  /**
   * Eine fiktive Beispielnotiz.
   *
   * @var     array
   */
  protected $dummyNote;

  /**
   * Ein fiktiver Beispielcuepoint.
   *
   * @var     array
   */
  protected $dummyCuepoint;

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
    $this->dummyVideo = TestCommons::dummyVideo();
    $this->dummyPaper = TestCommons::dummyPaper();
    $this->dummyNote = TestCommons::dummyNote();
    $this->dummyCuepoint = TestCommons::dummyCuepoint();
  }

  /**
   * Testet ob ein Video Objekt erzeugt werden kann.
   *
   */
  public function createANewVideo(UnitTester $I)
  {
     $I->canCreate('Video');
  }

  /**
   * Testet, ob die Datenbankverknüpfuung Video-Cuepoint definiert wurde.
   *
   */
  public function checkIfHasManyCuepointsExits(UnitTester $I)
  {
    $video = new Video;
    $I->seeMethod($video,'cuepoints');
  }

  /**
   * Testet, ob die Datenbankverknüpfuung Video-Paper definiert wurde.
   *
   */
  public function checkIfHasManyPapersExits(UnitTester $I)
  {
    $video = new Video;
    $I->seeMethod($video,'papers');
  }

  /**
   * Testet, ob die Datenbankverknüpfuung Video-Note definiert wurde.
   *
   */
  public function checkIfHasManyNotesExits(UnitTester $I)
  {
    $video = new Video;
    $I->seeMethod($video,'notes');
  }

  /**
   * Testet, ob ein freigeschaltetes Video verfügbar ist.
   *
   */
  public function getIsAvailable(UnitTester $I)
  {
    // Beispieldatensatz generieren
    $this->dummyVideo['videoname'] = 'Sozialgeschichte 1';
    $this->dummyVideo['available_from'] = '2000-01-01';
    $I->haveRecord('videos', $this->dummyVideo);

    // Methode ausführen
    $available = Video::available('Sozialgeschichte 1');

    // Testen
    $I->AssertTrue($available);
  }

  /**
   * Testet, ob ein nicht-freigeschaltetes Video nicht verfügbar ist.
   *
   */
  public function getIsNotAvailable(UnitTester $I)
  {
    // Beispieldatensatz generieren
    $this->dummyVideo['videoname'] = 'Sozialgeschichte 1';
    $this->dummyVideo['available_from'] = '3000-01-01';
    $I->haveRecord('videos', $this->dummyVideo);

    // Methode ausführen
    $available = Video::available('Sozialgeschichte 1');

    // Testen
    $I->AssertFalse($available);
  }

  /**
   * Testet, ob das korrekte Veröffentlichungsdatum ausgelesen wird.
   *
   */
  public function getUnlockDate(UnitTester $I)
  {
    // Beispieldatensatz generieren
    $this->dummyVideo['videoname'] = 'Sozialgeschichte 1';
    $this->dummyVideo['available_from'] = '0000-01-01';
    $I->haveRecord('videos', $this->dummyVideo);

    // Methode ausführen
    $unlockDate = Video::unlockDate('Sozialgeschichte 1');

    // Testen
    $I->AssertEquals($unlockDate, '0000-01-01');
  }

  /**
   * Testet das Auslesen des Auslesen des Datums bis zu dem das Video verfügbar ist.
   *
   */
  public function getFinalDate(UnitTester $I)
  {
    // Beispieldatensatz generieren
    $this->dummyVideo['videoname'] = 'Sozialgeschichte 1';
    $this->dummyVideo['available_to'] = '4000-01-03';
    $I->haveRecord('videos', $this->dummyVideo);

    // Methode ausführen
    $finalDate = Video::finalDate('Sozialgeschichte 1');

    // Testen
    $I->AssertEquals($finalDate, '4000-01-03');
  }

  /**
   * Testet das Auslesen des Datums bis zu dem das Video verfügbar ist.
   *
   */
  public function getSection(UnitTester $I)
  {
    // Beispieldatensatz generieren
    $this->dummyVideo['videoname'] = 'Sozialgeschichte 1';
    $this->dummyVideo['section'] = 'Geschichte';
    $I->haveRecord('videos', $this->dummyVideo);

    // Methode ausführen
    $section = Video::getSection('Sozialgeschichte 1');

    // Testen
    $I->AssertEquals($section, 'Geschichte');
  }

  /**
   * Testet das Auslesen der Texte zu einem Video.
   *
   */
  public function getPapers(UnitTester $I)
  {
    // Beispieldatensatz generieren
    $this->dummyVideo['videoname'] = 'Sozialgeschichte 1';
    $I->haveRecord('videos', $this->dummyVideo);

    $this->dummyPaper['papername'] = 'Die Chronologie';
    $this->dummyPaper['video_videoname'] = 'Sozialgeschichte 1';
    $I->haveRecord('papers', $this->dummyPaper);

    // Methode ausführen
    $paper = Video::getPapers('Sozialgeschichte 1');

    // Testen
    $I->AssertEquals($paper->first()->pluck('papername'), 'Die Chronologie');
  }

  /**
   * Testet das Auslesen der Cuepoints eines Videos.
   *
   */
  public function findCuepoints(UnitTester $I)
  {
    // Beispieldatensatz generieren
    $this->dummyCuepoint['id'] = 1;
    $this->dummyCuepoint['cuepoint'] = 10;
    $this->dummyCuepoint['video_videoname'] = 'Sozialgeschichte 1';
    $I->haveRecord('cuepoints', $this->dummyCuepoint);

    $this->dummyCuepoint['id'] = 2;
    $this->dummyCuepoint['cuepoint'] = 100;
    $this->dummyCuepoint['video_videoname'] = 'Sozialgeschichte 1';
    $I->haveRecord('cuepoints', $this->dummyCuepoint);

    $this->dummyVideo['videoname'] = 'Sozialgeschichte 1';
    $I->haveRecord('videos', $this->dummyVideo);

    // Methode ausführen
    $cuepoints = Video::getCuepoints('Sozialgeschichte 1');

    // Testen
    $I->AssertEquals($cuepoints->first()->pluck('cuepoint'), 10);
  }

  /**
   * Testet das Auslesen der Cuepoints eines Videos.
   *
   */
  public function findFirstCuepointId(UnitTester $I)
  {
    // Beispieldatensatz generieren
    $this->dummyCuepoint['id'] = 1;
    $this->dummyCuepoint['cuepoint'] = 10;
    $this->dummyCuepoint['video_videoname'] = 'Sozialgeschichte 2';
    $I->haveRecord('cuepoints', $this->dummyCuepoint);

    $this->dummyCuepoint['id'] = 2;
    $this->dummyCuepoint['cuepoint'] = 200;
    $this->dummyCuepoint['video_videoname'] = 'Sozialgeschichte 2';
    $I->haveRecord('cuepoints', $this->dummyCuepoint);

    $this->dummyCuepoint['id'] = 3;
    $this->dummyCuepoint['cuepoint'] = 300;
    $this->dummyCuepoint['video_videoname'] = 'Sozialgeschichte 1';
    $I->haveRecord('cuepoints', $this->dummyCuepoint);

    $this->dummyVideo['id'] = 1;
    $this->dummyVideo['videoname'] = 'Sozialgeschichte 1';
    $I->haveRecord('videos', $this->dummyVideo);

    $this->dummyVideo['id'] = 2;
    $this->dummyVideo['videoname'] = 'Sozialgeschichte 2';
    $I->haveRecord('videos', $this->dummyVideo);

    // Methode ausführen
    $cuepoints = Video::getFirstCuepointId('Sozialgeschichte 1');

    // Testen
    $I->AssertEquals($cuepoints, 3);
  }

  /**
   * Testet das Auslesen der Fähnchen eines Videos.
   *
   */
  public function getFlagnames(UnitTester $I)
  {
    // Beispieldatensatz generieren
    $this->dummyCuepoint['id'] = 1;
    $this->dummyCuepoint['content'] = 'Fähnchen X';
    $this->dummyCuepoint['video_videoname'] = 'Sozialgeschichte 1';
    $I->haveRecord('cuepoints', $this->dummyCuepoint);

    $this->dummyCuepoint['id'] = 2;
    $this->dummyCuepoint['content'] = 'Fähnchen Y';
    $this->dummyCuepoint['video_videoname'] = 'Sozialgeschichte 1';
    $I->haveRecord('cuepoints', $this->dummyCuepoint);

    $this->dummyVideo['videoname'] = 'Sozialgeschichte 1';
    $I->haveRecord('videos', $this->dummyVideo);

    // Methode ausführen
    $flagnames = Video::getFlagnames('Sozialgeschichte 1');

    // Testen
    $I->AssertEquals($flagnames, ['Fähnchen X', 'Fähnchen Y']);
  }

  /**
   * Testet das Auslesen der Fähnchen eines Videos.
   *
   * @uses Parser::htmlMarkup um das HTML Markup zu generieren.
   */
  public function getAllFlagnamesAsHTML(UnitTester $I)
  {
    // Beispieldatensatz generieren
    $this->dummyCuepoint['id'] = 1;
    $this->dummyCuepoint['content'] = 'Fähnchen X';
    $this->dummyCuepoint['video_videoname'] = 'Sozialgeschichte 1';
    $I->haveRecord('cuepoints', $this->dummyCuepoint);

    $this->dummyCuepoint['id'] = 2;
    $this->dummyCuepoint['content'] = 'Fähnchen Y';
    $this->dummyCuepoint['video_videoname'] = 'Sozialgeschichte 1';
    $I->haveRecord('cuepoints', $this->dummyCuepoint);

    $this->dummyVideo['videoname'] = 'Sozialgeschichte 1';
    $I->haveRecord('videos', $this->dummyVideo);

    // Methode ausführen
    $flagnames = Video::getAllFlagnamesAsHTML('Sozialgeschichte 1');

    $htmlMarkup = Parser::htmlMarkup('Sozialgeschichte 1','<h2 style="height:250px;">Fähnchen X</h2><h2 style="height:250px;">Fähnchen Y</h2>');

    // Testen
    $I->AssertEquals($flagnames, $htmlMarkup);
  }

  /**
   * Testet das Auslesen aller Videos.
   *
   */
  public function getVideos(UnitTester $I)
  {
    // Beispieldatensatz generieren
    $this->dummyVideo['id'] = 1;
    $this->dummyVideo['videoname'] = 'Sozialgeschichte 1';
    $I->haveRecord('videos', $this->dummyVideo);

    $this->dummyVideo['id'] = 2;
    $this->dummyVideo['videoname'] = 'Sozialgeschichte 2';
    $I->haveRecord('videos', $this->dummyVideo);

    // Methode ausführen
    $videos = Video::getVideos();

    $videos = count($videos->toArray());

    // Testen
    $I->AssertEquals($videos, 2);
  }

  /**
   * Testet das Auslesen des aktuellen Videos.
   *
   */
  public function getCurrentVideo(UnitTester $I)
  {
    // Beispieldatensatz generieren
    $this->dummyVideo['id'] = 1;
    $this->dummyVideo['videoname'] = 'Star Wars: Die Rachde der Sith';
    $this->dummyVideo['available_from'] = date("Y-m-d", strtotime("+30 days"));
    $I->haveRecord('videos', $this->dummyVideo);

    $this->dummyVideo['id'] = 2;
    $this->dummyVideo['videoname'] = 'Star Wars: Die Rückkehr der Jediritter';
    $this->dummyVideo['available_from'] = date("Y-m-d", strtotime("-10 days"));
    $I->haveRecord('videos', $this->dummyVideo);

    $this->dummyVideo['id'] = 3;
    $this->dummyVideo['videoname'] = 'Star Wars: Eine neue Hoffnung';
    $this->dummyVideo['available_from'] = date("Y-m-d", strtotime("-1 days"));
    $I->haveRecord('videos', $this->dummyVideo);

    $this->dummyVideo['id'] = 4;
    $this->dummyVideo['videoname'] = 'Star Wars: Eine dunkle Bedrohung';
    $this->dummyVideo['available_from'] = date("Y-m-d", strtotime("+70 days"));
    $I->haveRecord('videos', $this->dummyVideo);

    // Methode ausführen
    $video = Video::getCurrentVideo();

    // Testen
    $I->AssertEquals($video->videoname, 'Star Wars: Eine neue Hoffnung');
  }

  /**
   * Testet die Ausgabe wenn kein Video verfügbar ist.
   *
   */
  public function getFalseIfThereIsNoCurrentVideo(UnitTester $I)
  {
    // Methode ausführen
    $video = Video::getCurrentVideo();

    // Testen
    $I->AssertFalse($video);
  }

  /**
   * Testet, ob ein Video online verfügbar ist.
   *
   */
  public function getOnline(UnitTester $I)
  {
    // Beispieldatensatz generieren
    $this->dummyVideo['id'] = 1;
    $this->dummyVideo['videoname'] = 'Star Wars: Die Rachde der Sith';
    $this->dummyVideo['online'] = 1;
    $I->haveRecord('videos', $this->dummyVideo);

    $this->dummyVideo['id'] = 2;
    $this->dummyVideo['videoname'] = 'Star Wars: Die Rückkehr der Jediritter';
    $this->dummyVideo['online'] = 0;
    $I->haveRecord('videos', $this->dummyVideo);

    $this->dummyVideo['id'] = 3;
    $this->dummyVideo['videoname'] = 'Star Wars: Eine neue Hoffnung';
    $this->dummyVideo['online'] = 1;
    $I->haveRecord('videos', $this->dummyVideo);

    $this->dummyVideo['id'] = 4;
    $this->dummyVideo['videoname'] = 'Star Wars: Eine dunkle Bedrohung';
    $this->dummyVideo['online'] = 0;
    $I->haveRecord('videos', $this->dummyVideo);

    // Methode ausführen
    $online = Video::getOnline('Star Wars: Die Rachde der Sith');

    // Testen
    $I->AssertEquals($online, true);
  }

}
