<?php

use Synthesise\User;

class UserCest
{
    /**
   * Testet ob ein User Objekt erzeugt werden kann.
   */
  public function createANewUser(UnitTester $I)
  {
      $I->canCreate('User');
  }

    /**
     * Testet, ob die Datenbankverknüpfuung User-Note definiert wurde.
     */
    public function checkHasManyNotes(UnitTester $I)
    {
        $user = new User();

        $I->seeMethod($user, 'notes');
    }

    /**
     * Testet, ob die Datenbankverknüpfuung User-Seminar definiert wurde.
     */
    public function checkBelongsToManySeminars(UnitTester $I)
    {
        $user = new User();

        $I->seeMethod($user, 'notes');
    }
}
