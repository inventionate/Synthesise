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
            'path' => 'public/papers/b45de26dbdb4fff684da273150785515.pdf',
            'lection_name' => 'Griechisch-römische Antike',
        ));

        Paper::create(array(
            'name' => 'Vom Kindheitsmythos zur Lebenswelt der Kinder',
            'author' => 'Oskar Negt',
            'path' => 'public/papers/b6d8ed2c0af66832d8913918a790f23f.pdf',
            'lection_name' => 'Mittelalter',
        ));

        Paper::create(array(
            'name' => 'Wandel der Erziehungsverhältnisse',
            'author' => 'Heinz-Elmar Tenorth',
            'path' => 'public/papers/437c502f65789d9d5ba422749f0c8aff.pdf',
            'lection_name' => 'Frühe Neuzeit',
        ));

        // IDEENGESCHICHTE

        Paper::create(array(
            'name' => 'Auszug aus »Émile« und »Julie«',
            'author' => 'Jean-Jacques Rousseau',
            'path' => 'public/papers/3695f38cc1a04f0a1077795a35b2ca7a.pdf',
            'lection_name' => 'Jean-Jacques Rousseau',
        ));

        Paper::create(array(
            'name' => 'Auszug aus dem »Stanser Brief«',
            'author' => 'Johann Heinrich Pestalozzi',
            'path' => 'public/papers/159c9802164d9e81d996d8c750bd40a2.pdf',
            'lection_name' => 'Johann Heinrich Pestalozzi',
        ));

        Paper::create(array(
            'name' => 'Auszug aus dem »Königsberger« und dem »Litauer Schulplan«',
            'author' => 'Wilhelm von Humboldt',
            'path' => 'public/papers/974817a04ed98fe213a5a9e9c8b5f388.pdf',
            'lection_name' => 'Wilhelm von Humboldt',
        ));

        // SCHULE UND ERZIEHUNG

        Paper::create(array(
            'name' => 'Über die Grenzen der Erziehung in Schule und Unterricht',
            'author' => 'Heinz-Jürgen Ipfling',
            'path' => 'public/papers/807a2a16e3bb1ca62a38a214c3d46c37.pdf',
            'lection_name' => 'Erziehung und Unterricht',
        ));

        Paper::create(array(
            'name' => 'Inklusive Bildung: Wirksame Unterstützung des Lernens für alle Schüler',
            'author' => 'Clemens Hillenbrand',
            'path' => 'public/papers/47b9da8d58af0efcbc648a6a6aca74a0.pdf',
            'lection_name' => 'Heterogenität',
        ));

        // BILDUNG – GLÜCK – GERECHTIGKEIT

        Paper::create(array(
            'name' => 'Bildung, Halbbildung, Unbildung',
            'author' => 'Konrad Paul Liessmann',
            'path' => 'public/papers/946633e9829a1960fb4aa1edec11b586.pdf',
            'lection_name' => 'Wozu ist die Bildung da?',
        ));

        Paper::create(array(
            'name' => 'Glück soll lernbar sein? Ist es aber nicht!',
            'author' => 'Timo Hoyer',
            'path' => 'public/papers/fa98460dc923522f007300b83c4d3c56.pdf',
            'lection_name' => 'Bildung und Glück',
        ));

        Paper::create(array(
            'name' => 'Bildungsgerechtigkeit',
            'author' => 'Krassimir Stojanov',
            'path' => 'public/papers/57697ffbb139e4367ddfe309e824c6ea.pdf',
            'lection_name' => 'Bildung und Gerechtigkeit',
        ));

        // FRÜHPÄDAGOGIK

        Paper::create(array(
            'name' => 'Die erste Vorlesung über Pädagogik',
            'author' => 'Johann Friedrich Herbart',
            'path' => 'public/papers/55a1fd903fa4a3edc56226e47eab8889.pdf',
            'lection_name' => 'Erziehung und Bildung als Gegenstand wissenschaftlicher Praxis',
        ));

        Paper::create(array(
            'name' => 'Modus in rebus: die Moral des Zeigens',
            'author' => 'Klaus Prange',
            'path' => 'public/papers/3b83fb37a031606409b865ebc18e7a77.pdf',
            'lection_name' => 'Was meint Erziehung?',
        ));

        Paper::create(array(
            'name' => 'Bildungsgerechtigkeit',
            'author' => 'Krassimir Stojanov',
            'path' => 'public/papers/57697ffbb139e4367ddfe309e824c6ea.pdf',
            'lection_name' => 'Bildung gegen Intoleranz und Erziehung zu Toleranz',
        ));

        Paper::create(array(
            'name' => 'Bildungsgerechtigkeit',
            'author' => 'Krassimir Stojanov',
            'path' => 'public/papers/57697ffbb139e4367ddfe309e824c6ea.pdf',
            'lection_name' => 'Zahldarstellungen und Stellenwertsysteme',
        ));

        Paper::create(array(
            'name' => 'Bildungsgerechtigkeit',
            'author' => 'Krassimir Stojanov',
            'path' => 'public/papers/57697ffbb139e4367ddfe309e824c6ea.pdf',
            'lection_name' => 'Addition und Subtraktion',
        ));

        Paper::create(array(
            'name' => 'Bildungsgerechtigkeit',
            'author' => 'Krassimir Stojanov',
            'path' => 'public/papers/57697ffbb139e4367ddfe309e824c6ea.pdf',
            'lection_name' => 'Multiplikation und Division',
        ));

    }
}
