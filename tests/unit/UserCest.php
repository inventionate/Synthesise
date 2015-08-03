<?php

use UnitTester;
use Synthesise\User;
use Synthesise\Note;

class UserCest
{
    /**
   * Testet ob ein User Objekt erzeugt werden kann.
   */
  public function testCreateANewUser(UnitTester $I)
  {
      $I->wantTo('create a new user object');
      $I->canCreate('User');
  }

    /**
     * Testet, ob die Datenbankverknüpfuung User-Note definiert wurde.
     */
    public function testCheckHasManyNotes(UnitTester $I)
    {
        $I->wantTo('see if hasMay realtionship method exits');
        $user = new User();
        $I->seeMethod($user, 'notes');
    }
}
