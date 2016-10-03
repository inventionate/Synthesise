<?php

use Illuminate\Database\Seeder;

class LectionSectionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lection_section')->delete();


        DB::table('lection_section')->insert([
           'lection_name' => 'Griechisch-römische Antike',
           'section_id' => 1,
           'available_from' => '2015-10-21',
           'available_to' => '2017-02-17',
        ]);

        DB::table('lection_section')->insert([
           'lection_name' => 'Mittelalter',
           'section_id' => 1,
           'available_from' => '2015-10-28',
           'available_to' => '2016-02-17',
        ]);

        DB::table('lection_section')->insert([
           'lection_name' => 'Frühe Neuzeit',
           'section_id' => 1,
           'available_from' => '2015-11-04',
           'available_to' => '2016-02-17',
        ]);


        DB::table('lection_section')->insert([
           'lection_name' => 'Jean-Jacques Rousseau',
           'section_id' => 2,
           'available_from' => '2015-11-11',
           'available_to' => '2016-02-17',
        ]);

        DB::table('lection_section')->insert([
           'lection_name' => 'Johann Heinrich Pestalozzi',
           'section_id' => 2,
           'available_from' => '2015-11-18',
           'available_to' => '2016-02-17',
        ]);

        DB::table('lection_section')->insert([
           'lection_name' => 'Wilhelm von Humboldt',
           'section_id' => 2,
           'available_from' => '2015-11-25',
           'available_to' => '2016-02-17',
        ]);


        DB::table('lection_section')->insert([
           'lection_name' => 'Erziehung und Unterricht',
           'section_id' => 3,
           'available_from' => '2015-12-02',
           'available_to' => '2016-02-17',
        ]);

        DB::table('lection_section')->insert([
           'lection_name' => 'Heterogenität',
           'section_id' => 3,
           'available_from' => '2015-12-9',
           'available_to' => '2016-02-17',
        ]);


        DB::table('lection_section')->insert([
           'lection_name' => 'Wozu ist die Bildung da?',
           'section_id' => 4,
           'available_from' => '2015-12-16',
           'available_to' => '2016-02-17',
        ]);

        DB::table('lection_section')->insert([
           'lection_name' => 'Bildung und Glück',
           'section_id' => 4,
           'available_from' => '2015-12-23',
           'available_to' => '2016-02-17',
        ]);

        DB::table('lection_section')->insert([
           'lection_name' => 'Bildung und Gerechtigkeit',
           'section_id' => 4,
           'available_from' => '2015-12-31',
           'available_to' => '2014-02-28',
        ]);

    }
}
