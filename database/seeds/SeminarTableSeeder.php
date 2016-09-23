<?php

use Illuminate\Database\Seeder;

use Synthesise\Seminar;

class SeminarTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('seminars')->delete();

        // AHEW

        Seminar::create(array(
            'name' => 'Grundlagen pädagogischen Denkens und Handelns',
            'subject' => 'Allgemeine und Historische Erziehungswissenschaft',
            'module' => 'M1',
            'author' => 'Apl. Prof. Dr. Timo Hoyer',
            'authorized_editors' => '[]',
            'image_path' => '',
            'info_path' => '',
            'available_from' => '2015-12-16',
            'available_to' => '2017-02-17',
        ));

        // FRÜHPÄDAGOGIK
        Seminar::create(array(
            'name' => 'Geschichte(n) und Theorien (früh-)kindlicher Bildung und Entwicklung',
            'subject' => 'Frühpädagogik',
            'module' => 'M1',
            'author' => 'Prof. Dr. Ulrich Wehner',
            'authorized_editors' => '[]',
            'image_path' => '',
            'info_path' => '',
            'available_from' => '2015-12-16',
            'available_to' => '2016-02-17',
        ));

    }
}
