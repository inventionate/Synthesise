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
        ]);

        DB::table('lection_section')->insert([
           'lection_name' => 'Mittelalter',
           'section_id' => 1,
        ]);

        DB::table('lection_section')->insert([
           'lection_name' => 'Frühe Neuzeit',
           'section_id' => 1,
        ]);


        DB::table('lection_section')->insert([
           'lection_name' => 'Jean-Jacques Rousseau',
           'section_id' => 2,
        ]);

        DB::table('lection_section')->insert([
           'lection_name' => 'Johann Heinrich Pestalozzi',
           'section_id' => 2,
        ]);

        DB::table('lection_section')->insert([
           'lection_name' => 'Wilhelm von Humboldt',
           'section_id' => 2,
        ]);


        DB::table('lection_section')->insert([
           'lection_name' => 'Erziehung und Unterricht',
           'section_id' => 3,
        ]);

        DB::table('lection_section')->insert([
           'lection_name' => 'Heterogenität',
           'section_id' => 3,
        ]);


        DB::table('lection_section')->insert([
           'lection_name' => 'Wozu ist die Bildung da?',
           'section_id' => 4,
        ]);

        DB::table('lection_section')->insert([
           'lection_name' => 'Bildung und Glück',
           'section_id' => 4,
        ]);

        DB::table('lection_section')->insert([
           'lection_name' => 'Bildung und Gerechtigkeit',
           'section_id' => 4,
        ]);

    }
}
