<?php

use Illuminate\Database\Seeder;
use Synthesise\Lection;

class LectionTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('lections')->delete();

        Lection::create(array(
            'id' => 1,
            'name' => 'Griechisch-römische Antike',
            'author' => 'Apl. Prof. Dr. Timo Hoyer',
            'contact' => 'hoyer@ph-karlsruhe.de',
            'authorized_editors' => ["dozent", "root"],
            'image_path' => 'img/seminars/griechisch_roemische_antike.jpg',
            'available_from' => '2015-10-21',
            'available_to' => '2017-02-17',
        ));

        Lection::create(array(
            'id' => 2,
            'name' => 'Mittelalter',
            'author' => 'Apl. Prof. Dr. Timo Hoyer',
            'contact' => 'hoyer@ph-karlsruhe.de',
            'authorized_editors' => ["root"],
            'image_path' => 'img/seminars/mittelalter.jpg',
            'available_from' => '2015-10-28',
            'available_to' => '2016-02-17',
        ));

        Lection::create(array(
            'id' => 3,
            'name' => 'Frühe Neuzeit',
            'author' => 'Apl. Prof. Dr. Timo Hoyer',
            'contact' => 'hoyer@ph-karlsruhe.de',
            'authorized_editors' => ["root"],
            'image_path' => 'img/seminars/fruehe_neuzeit.jpg',
            'available_from' => '2015-11-04',
            'available_to' => '2016-02-17',
        ));

        Lection::create(array(
            'id' => 4,
            'name' => 'Jean-Jacques Rousseau',
            'author' => 'Prof. Dr. Rainer Bolle',
            'contact' => 'bolle@ph-karlsruhe.de',
            'authorized_editors' => ["root"],
            'image_path' => 'img/seminars/jean_jacques_rousseau.jpg',
            'available_from' => '2015-11-11',
            'available_to' => '2016-02-17',
        ));

        Lection::create(array(
            'id' => 5,
            'name' => 'Johann Heinrich Pestalozzi',
            'author' => 'Prof. Dr. Gabriele Weigand',
            'contact' => 'weigand@ph-karlsruhe.de',
            'authorized_editors' => ["root"],
            'image_path' => 'img/seminars/johann_heinrich_pestalozzi.jpg',
            'available_from' => '2015-11-18',
            'available_to' => '2016-02-17',
        ));

        Lection::create(array(
            'id' => 6,
            'name' => 'Wilhelm von Humboldt',
            'author' => 'Prof. Dr. Gabriele Weigand',
            'contact' => 'weigand@ph-karlsruhe.de',
            'authorized_editors' => ["root"],
            'image_path' => 'img/seminars/wilhelm_von_humboldt.jpg',
            'available_from' => '2015-11-25',
            'available_to' => '2016-02-17',
        ));

        Lection::create(array(
            'id' => 7,
            'name' => 'Erziehung und Unterricht',
            'author' => 'Dr. Albert Berger',
            'contact' => 'berger@ph-karlsruhe.de',
            'authorized_editors' => ["root"],
            'image_path' => 'img/seminars/erziehung_und_unterricht.jpg',
            'available_from' => '2015-12-02',
            'available_to' => '2016-02-17',
        ));

        Lection::create(array(
            'id' => 8,
            'name' => 'Heterogenität',
            'author' => 'Dr. Albert Berger',
            'contact' => 'berger@ph-karlsruhe.de',
            'authorized_editors' => ["root"],
            'image_path' => 'img/seminars/heterogenitaet.jpg',
            'available_from' => '2015-12-9',
            'available_to' => '2016-02-17',
        ));

        Lection::create(array(
            'id' => 9,
            'name' => 'Wozu ist die Bildung da?',
            'author' => 'Apl. Prof. Dr. Timo Hoyer',
            'contact' => 'hoyer@ph-karlsruhe.de',
            'authorized_editors' => ["root"],
            'image_path' => 'img/seminars/wozu_ist_die_bildung_da.jpg',
            'available_from' => '2015-12-16',
            'available_to' => '2016-02-17',
        ));

        Lection::create(array(
            'id' => 10,
            'name' => 'Bildung und Glück',
            'author' => 'Apl. Prof. Dr. Timo Hoyer',
            'contact' => 'hoyer@ph-karlsruhe.de',
            'authorized_editors' => ["root"],
            'image_path' => '',
            'available_from' => '2015-12-23',
            'available_to' => '2016-02-17',
        ));

        Lection::create(array(
            'id' => 11,
            'name' => 'Bildung und Gerechtigkeit',
            'author' => 'Apl. Prof. Dr. Timo Hoyer',
            'contact' => 'hoyer@ph-karlsruhe.de',
            'authorized_editors' => ["root"],
            'image_path' => '',
            'available_from' => '2015-12-31',
            'available_to' => '2014-02-28',
        ));
    }
}
