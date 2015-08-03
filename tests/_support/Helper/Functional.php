<?php

namespace Helper;

use _data\TestDatabaseSeeder;

// here you can define custom actions
// all public methods declared in helper class will be available in $I

class Functional extends \Codeception\Module
{
    private $Data;

    public function __construct()
    {
        $this->Data = new TestDatabaseSeeder();
    }
    /**
     * Beispieldatensätze generien.
     *
     * @param FunctionalTester $I
     */
    public function seedDatabase(\FunctionalTester $I)
    {
        $this->Data->seedCuepoints($I);
        $this->Data->seedFaqs($I);
        $this->Data->seedMessages($I);
        $this->Data->seedNotes($I);
        $this->Data->seedPapers($I);
        $this->Data->seedUsers($I);
        $this->Data->seedVideos($I);
    }
}
