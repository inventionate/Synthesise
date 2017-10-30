<?php

class SequenceRepositoryCest
{
    /**
     * Test to store new help point.
     */
    public function testStoreNewHelpPoint(IntegrationTester $I)
    {
        // Beispieldatensatz generieren
        $I->have('Synthesise\Sequence', ['id' => 1, 'help_points' => NULL]);

        $help_point = 3.2213314;

        // Update durchführen
        Sequence::updateHelpPoints(1, $help_point);

        // Überprüfen
        $I->seeRecord('Synthesise\Sequence', ['id' => 1, 'help_points' => json_encode($help_point)]);
    }

    /**
     * Test to update help points.
     */
    public function testUpdateHelpPoints(IntegrationTester $I)
    {
        // Beispieldatensatz generieren
        $I->have('Synthesise\Sequence', ['id' => 1, 'help_points' => json_encode([3.2213314, 17.0209278])]);

        $help_point = 39.2213314;

        // Update durchführen
        Sequence::updateHelpPoints(1, $help_point);

        // Überprüfen
        $I->seeRecord('Synthesise\Sequence', ['id' => 1, 'help_points' => json_encode([3.2213314, 17.0209278, 39.2213314])]);

    }

    /**
     * Test to delete help points
     */
    public function testDeleteHelpPoints(IntegrationTester $I)
    {
        // Beispieldatensatz generieren
        $I->have('Synthesise\Sequence', ['id' => 1]);

        // Help points löschen
        Sequence::deleteHelpPoints(1);

        // Überprüfen
        $I->seeRecord('Synthesise\Sequence', ['id' => 1, 'help_points' => NULL]);
    }

    /**
     * Test to get help points
     */
    public function testGetHelpPoints(IntegrationTester $I)
    {
        // Beispieldatensatz generieren
        $I->have('Synthesise\Sequence', ['id' => 1, 'help_points' => json_encode([3.2213314, 17.0209278, 39.2213314, 67.0209278])]);

        // Help points löschen
        $help_points = Sequence::getHelpPoints(1);

        // Überprüfen
        $I->assertEquals(json_encode([3.2213314, 17.0209278, 39.2213314, 67.0209278]), $help_points);
    }

}
