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
            'description' => 'Hier geht es um die Grundlagen von Erziehung und Bildung.',
            'module' => 'M1',
            'author' => 'Apl. Prof. Dr. Timo Hoyer',
            'contact' => 'hoyer@ph-karlsruhe.de',
            'authorized_editors' => ["dozent", "root"],
            'image_path' => 'img/seminars/title_1.jpg',
            'info_path' => NULL,
            'available_from' => '2015-12-16',
            'available_to' => '2017-02-17',
            'disqus_shortname' => 'etpm',
        ));

        // FRÜHPÄDAGOGIK
        Seminar::create(array(
            'name' => 'Geschichte(n) und Theorien (früh-)kindlicher Bildung und Entwicklung',
            'subject' => 'Frühpädagogik',
            'description' => 'Hier geht es um die frühpädagogischen Grundlagen von Erziehung und Bildung.',
            'module' => 'M1',
            'author' => 'Prof. Dr. Ulrich Wehner',
            'contact' => 'wehner@ph-karlsruhe.de',
            'authorized_editors' => ["dozent", "root"],
            'image_path' => 'img/seminars/title_2.jpg',
            'info_path' => NULL,
            'available_from' => '2015-12-16',
            'available_to' => '2016-02-17',
            'disqus_shortname' => NULL
        ));

    }
}
