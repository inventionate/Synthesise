<?php

class FaqRepositoryCest
{

    public function testGetFaqLetters(IntegrationTester $I)
    {
        // Beispieldatensatz generieren
        $I->haveMultiple('Synthesise\Faq', 2, ['seminar_name' => 'Raum und Mensch']);

        // Abfrage durchführen
        $areas = FAQ::getLetters('Raum und Mensch');

        // Testergebnis auswerten
        $I->AssertEquals(2, count($areas));
    }

    /**
     * Testet die Abfrage aller vorhandenen Einträge.
     */
    public function testGetAllFaqs(IntegrationTester $I)
    {
        // Beispieldatensatz generieren
        $I->haveMultiple('Synthesise\Faq', 33, ['seminar_name' => 'Raum und Mensch']);

        // Abfrage durchführen
        $entries = FAQ::getAll('Raum und Mensch');

        // Testergebnis auswerten
        $I->AssertEquals(count($entries), 33);
    }

    /**
     * Testet die Abfrage in Abhängigkeit eines Buchstabens (area)
     *
    */
    public function testGetFaqsByLetter(IntegrationTester $I)
    {
        // Beispieldatensatz generieren
        $I->haveMultiple('Synthesise\Faq', 12, ['seminar_name' => 'Raum und Mensch', 'area' => 'Z']);
        $I->haveMultiple('Synthesise\Faq', 54, ['seminar_name' => 'Raum und Mensch', 'area' => 'V']);

        // Abfrage durchführen
        $entries = FAQ::getByLetter('Raum und Mensch', 'Z');

        // Testergebnis auswerten
        $I->AssertEquals(count($entries), 12);
    }
}
