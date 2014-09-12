<?php
use \UnitTester;

use Synthesise\Video;

class VideoCest
{

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

}
