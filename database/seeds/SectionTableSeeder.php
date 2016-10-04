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
            'id' => 1,
            'name' => 'Sozialgeschichte der Erziehung und Bildung',
            'further_reading_path' => 'storage/sections/29ce8e67b655c50aef1b562919f417c6.pdf',
            'seminar_name' => 'Grundlagen pädagogischen Denkens und Handelns',
        ));

        Section::create(array(
            'id' => 2,
            'name' => 'Ideen- und Personengeschichte der Pädagogik',
            'further_reading_path' => 'storage/sections/d4f7609f620e769049602f9f3765f4d2.pdf',
            'seminar_name' => 'Grundlagen pädagogischen Denkens und Handelns',
        ));

        Section::create(array(
            'id' => 3,
            'name' => 'Erziehung und Schule',
            'further_reading_path' => 'storage/sections/a0fd03a04886a3861bdb2c1978eaabf5.pdf',
            'seminar_name' => 'Grundlagen pädagogischen Denkens und Handelns',
        ));

        Section::create(array(
            'id' => 4,
            'name' => 'Bildung – Glück – Gerechtigkeit',
            'further_reading_path' => 'storage/sections/73e676555fc9f572155b44678e95f429.pdf',
            'seminar_name' => 'Grundlagen pädagogischen Denkens und Handelns',
        ));

    }
}
