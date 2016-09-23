<?php

use Illuminate\Database\Seeder;
use Synthesise\Paper;

class PaperTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('papers')->delete();

        // SOZIALGESCHICHTE

        Paper::create(array(
            'name' => 'Ethik und Moralerziehung',
            'author' => 'Timo Hoyer',
            'path' => storage_path('app/pdf/allgemeine_informationen_und_termine.pdf'),
            'lection_name' => 'Griechisch-römische Antike',
        ));

        Paper::create(array(
            'name' => 'Vom Kindheitsmythos zur Lebenswelt der Kinder',
            'author' => 'Oskar Negt',
            'path' => '',
            'lection_name' => 'Mittelalter',
        ));

        Paper::create(array(
            'name' => 'Wandel der Erziehungsverhältnisse',
            'author' => 'Heinz-Elmar Tenorth',
            'path' => '',
            'lection_name' => 'Frühe Neuzeit',
        ));

        // IDEENGESCHICHTE

        Paper::create(array(
            'name' => 'Auszug aus »Émile« und »Julie«',
            'author' => 'Jean-Jacques Rousseau',
            'path' => '',
            'lection_name' => 'Jean-Jacques Rousseau',
        ));

        Paper::create(array(
            'name' => 'Auszug aus dem »Stanser Brief«',
            'author' => 'Johann Heinrich Pestalozzi',
            'path' => '',
            'lection_name' => 'Johann Heinrich Pestalozzi',
        ));

        Paper::create(array(
            'name' => 'Auszug aus dem »Königsberger« und dem »Litauer Schulplan«',
            'author' => 'Wilhelm von Humboldt',
            'path' => '',
            'lection_name' => 'Wilhelm von Humboldt',
        ));

        // SCHULE UND ERZIEHUNG

        Paper::create(array(
            'name' => 'Über die Grenzen der Erziehung in Schule und Unterricht',
            'author' => 'Heinz-Jürgen Ipfling',
            'path' => '',
            'lection_name' => 'Erziehung und Unterricht',
        ));

        Paper::create(array(
            'name' => 'Inklusive Bildung: Wirksame Unterstützung des Lernens für alle Schüler',
            'author' => 'Clemens Hillenbrand',
            'path' => '',
            'lection_name' => 'Heterogenität',
        ));

        // BILDUNG – GLÜCK – GERECHTIGKEIT

        Paper::create(array(
            'name' => 'Bildung, Halbbildung, Unbildung',
            'author' => 'Konrad Paul Liessmann',
            'path' => '',
            'lection_name' => 'Wozu ist die Bildung da?',
        ));

        Paper::create(array(
            'name' => 'Glück soll lernbar sein? Ist es aber nicht!',
            'author' => 'Timo Hoyer',
            'path' => '',
            'lection_name' => 'Bildung und Glück',
        ));

        Paper::create(array(
            'name' => 'Bildungsgerechtigkeit',
            'author' => 'Krassimir Stojanov',
            'path' => '',
            'lection_name' => 'Bildung und Gerechtigkeit',
        ));
    }
}
