<?php

use Synthesise\Cuepoint as Cuepoint;

class CuepointCest
{
    /**
     * Testet, ob ein Cuepoint Objekt generiert werden kann.
     */
    public function createANewCuepoint(UnitTester $I)
    {
        $I->canCreate('Cuepoint');
    }

    /**
     * Testet, ob die Datenbankverknüpfuung Cuepoint-Note definiert wurde.
     */
    public function checkHasManyNotes(UnitTester $I)
    {
        $cuepoint = new Cuepoint();
        $I->seeMethod($cuepoint, 'notes');
    }

    /**
     * Testet, ob die Datenbankverknüpfuung Cuepoint-Sequence definiert wurde.
     */
    public function checkBelongsToSequence(UnitTester $I)
    {
        $cuepoint = new Cuepoint();
        $I->seeMethod($cuepoint, 'sequence');
    }
}
