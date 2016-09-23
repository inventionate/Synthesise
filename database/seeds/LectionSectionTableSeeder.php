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
           'section_name' => 'Sozialgeschichte der Erziehung und Bildung',
           'created_at' => Carbon\Carbon::now(),
           'updated_at' => Carbon\Carbon::now(),
        ]);

        DB::table('lection_section')->insert([
           'lection_name' => 'Mittelalter',
           'section_name' => 'Sozialgeschichte der Erziehung und Bildung',
           'created_at' => Carbon\Carbon::now(),
           'updated_at' => Carbon\Carbon::now(),
        ]);

        DB::table('lection_section')->insert([
           'lection_name' => 'Frühe Neuzeit',
           'section_name' => 'Sozialgeschichte der Erziehung und Bildung',
           'created_at' => Carbon\Carbon::now(),
           'updated_at' => Carbon\Carbon::now(),
        ]);


        DB::table('lection_section')->insert([
           'lection_name' => 'Jean-Jacques Rousseau',
           'section_name' => 'Ideen- und Personengeschichte der Pädagogik',
           'created_at' => Carbon\Carbon::now(),
           'updated_at' => Carbon\Carbon::now(),
        ]);

        DB::table('lection_section')->insert([
           'lection_name' => 'Johann Heinrich Pestalozzi',
           'section_name' => 'Ideen- und Personengeschichte der Pädagogik',
           'created_at' => Carbon\Carbon::now(),
           'updated_at' => Carbon\Carbon::now(),
        ]);

        DB::table('lection_section')->insert([
           'lection_name' => 'Wilhelm von Humboldt',
           'section_name' => 'Ideen- und Personengeschichte der Pädagogik',
           'created_at' => Carbon\Carbon::now(),
           'updated_at' => Carbon\Carbon::now(),
        ]);


        DB::table('lection_section')->insert([
           'lection_name' => 'Erziehung und Unterricht',
           'section_name' => 'Erziehung und Schule',
           'created_at' => Carbon\Carbon::now(),
           'updated_at' => Carbon\Carbon::now(),
        ]);

        DB::table('lection_section')->insert([
           'lection_name' => 'Heterogenität',
           'section_name' => 'Erziehung und Schule',
           'created_at' => Carbon\Carbon::now(),
           'updated_at' => Carbon\Carbon::now(),
        ]);


        DB::table('lection_section')->insert([
           'lection_name' => 'Wozu ist die Bildung da?',
           'section_name' => 'Bildung – Glück – Gerechtigkeit',
           'created_at' => Carbon\Carbon::now(),
           'updated_at' => Carbon\Carbon::now(),
        ]);

        DB::table('lection_section')->insert([
           'lection_name' => 'Bildung und Glück',
           'section_name' => 'Bildung – Glück – Gerechtigkeit',
           'created_at' => Carbon\Carbon::now(),
           'updated_at' => Carbon\Carbon::now(),
        ]);

        DB::table('lection_section')->insert([
           'lection_name' => 'Bildung und Gerechtigkeit',
           'section_name' => 'Bildung – Glück – Gerechtigkeit',
           'created_at' => Carbon\Carbon::now(),
           'updated_at' => Carbon\Carbon::now(),
        ]);

    }
}
