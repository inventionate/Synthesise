<?php

use Illuminate\Database\Seeder;

class SeminarUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('seminar_user')->delete();


        DB::table('seminar_user')->insert([
           'seminar_name' => 'Grundlagen pädagogischen Denkens und Handelns',
           'user_id' => 4,
           'created_at' => Carbon\Carbon::now(),
           'updated_at' => Carbon\Carbon::now(),
        ]);

        DB::table('seminar_user')->insert([
           'seminar_name' => 'Grundlagen pädagogischen Denkens und Handelns',
           'user_id' => 3,
           'created_at' => Carbon\Carbon::now(),
           'updated_at' => Carbon\Carbon::now(),
        ]);

        DB::table('seminar_user')->insert([
           'seminar_name' => 'Geschichte(n) und Theorien (früh-)kindlicher Bildung und Entwicklung',
           'user_id' => 4,
           'created_at' => Carbon\Carbon::now(),
           'updated_at' => Carbon\Carbon::now(),
        ]);

    }
}
