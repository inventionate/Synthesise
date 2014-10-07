<?php
use \UnitTester;

use Synthesise\Video;

class VideoCest
{

  /**
   * Testet ob ein Video Objekt erzeugt werden kann.
   *
   */
  public function testCreateANewVideo(UnitTester $I)
  {
     $I->wantTo('create a new Video');

     $I->canCreate('Video');
  }

  /**
   * Testet, ob die Datenbankverknüpfuung Video-Cuepoint definiert wurde.
   *
   */
  public function testCheckIfHasManyCuepointsExits(UnitTester $I)
  {
    $I->wantTo('check if Video has many Cuepoint');

    $video = new Video;
    $I->seeMethod($video,'cuepoints');
  }

  /**
   * Testet, ob die Datenbankverknüpfuung Video-Paper definiert wurde.
   *
   */
  public function testCheckIfHasManyPapersExits(UnitTester $I)
  {
    $I->wantTo('check if Video has many Papers');

    $video = new Video;
    $I->seeMethod($video,'papers');
  }

  /**
   * Testet, ob die Datenbankverknüpfuung Video-Note definiert wurde.
   *
   */
  public function testCheckIfHasManyNotesExits(UnitTester $I)
  {
    $I->wantTo('check if Video has many Notes');

    $video = new Video;
    $I->seeMethod($video,'notes');
  }

}
