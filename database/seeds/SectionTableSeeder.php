<?php

use Illuminate\Database\Seeder;

use Synthesise\Section;

class SectionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('sections')->delete();

        // AHEW
        Section::create(array(
            'name' => 'Sozialgeschichte der Erziehung und Bildung',
            'further_reading_path' => '',
            'seminar_name' => 'Grundlagen pädagogischen Denkens und Handelns',
        ));

        Section::create(array(
            'name' => 'Ideen- und Personengeschichte der Pädagogik',
            'further_reading_path' => '',
            'seminar_name' => 'Grundlagen pädagogischen Denkens und Handelns',
        ));

        Section::create(array(
            'name' => 'Erziehung und Schule',
            'further_reading_path' => '',
            'seminar_name' => 'Grundlagen pädagogischen Denkens und Handelns',
        ));

        Section::create(array(
            'name' => 'Bildung – Glück – Gerechtigkeit',
            'further_reading_path' => '',
            'seminar_name' => 'Grundlagen pädagogischen Denkens und Handelns',
        ));

    }
}