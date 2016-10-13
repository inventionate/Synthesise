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
           'available_from' => '2016-11-02',
           'available_to' => '2017-02-03',
        ]);

        DB::table('lection_section')->insert([
           'lection_name' => 'Mittelalter',
           'section_id' => 1,
           'available_from' => '2016-11-09',
           'available_to' => '2017-02-03',
        ]);

        DB::table('lection_section')->insert([
           'lection_name' => 'Frühe Neuzeit',
           'section_id' => 1,
           'available_from' => '2016-11-16',
           'available_to' => '2017-02-03',
        ]);


        DB::table('lection_section')->insert([
           'lection_name' => 'Jean-Jacques Rousseau',
           'section_id' => 2,
           'available_from' => '2016-11-23',
           'available_to' => '2017-02-03',
        ]);

        DB::table('lection_section')->insert([
           'lection_name' => 'Wilhelm von Humboldt',
           'section_id' => 2,
           'available_from' => '2016-12-07',
           'available_to' => '2017-02-03',
        ]);


        DB::table('lection_section')->insert([
           'lection_name' => 'Erziehung und Unterricht',
           'section_id' => 3,
           'available_from' => '2016-12-14',
           'available_to' => '2017-02-03',
        ]);

        DB::table('lection_section')->insert([
           'lection_name' => 'Was meint Erziehung?',
           'section_id' => 3,
           'available_from' => '2016-12-21',
           'available_to' => '2017-02-03',
        ]);


        DB::table('lection_section')->insert([
           'lection_name' => 'Wozu ist die Bildung da?',
           'section_id' => 4,
           'available_from' => '2016-12-27',
           'available_to' => '2017-02-03',
        ]);

        DB::table('lection_section')->insert([
           'lection_name' => 'Bildung und Glück',
           'section_id' => 4,
           'available_from' => '2016-12-29',
           'available_to' => '2017-02-03',
        ]);

        DB::table('lection_section')->insert([
           'lection_name' => 'Bildung und Gerechtigkeit',
           'section_id' => 4,
           'available_from' => '2016-12-31',
           'available_to' => '2017-02-03',
        ]);

        // FRÜHPÄDAGOGIK

        DB::table('lection_section')->insert([
           'lection_name' => 'Erziehung und Bildung als Gegenstand wissenschaftlicher Praxis',
           'section_id' => 5,
           'available_from' => '2015-12-31',
           'available_to' => '2017-02-03',
        ]);

        DB::table('lection_section')->insert([
           'lection_name' => 'Was meint Erziehung?',
           'section_id' => 5,
           'available_from' => '2015-12-31',
           'available_to' => '2017-02-03',
        ]);

        DB::table('lection_section')->insert([
           'lection_name' => 'Bildung gegen Intoleranz und Erziehung zu Toleranz',
           'section_id' => 6,
           'available_from' => '2015-12-31',
           'available_to' => '2017-02-03',
        ]);

    }
}
