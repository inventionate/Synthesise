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
            'image_path' => 'storage/lections/griechisch_roemische_antike.jpg',
        ));

        Lection::create(array(
            'id' => 2,
            'name' => 'Mittelalter',
            'author' => 'Apl. Prof. Dr. Timo Hoyer',
            'contact' => 'hoyer@ph-karlsruhe.de',
            'authorized_editors' => ["root"],
            'image_path' => 'storage/lections/mittelalter.jpg',
        ));

        Lection::create(array(
            'id' => 3,
            'name' => 'Frühe Neuzeit',
            'author' => 'Apl. Prof. Dr. Timo Hoyer',
            'contact' => 'hoyer@ph-karlsruhe.de',
            'authorized_editors' => ["root"],
            'image_path' => 'storage/lections/fruehe_neuzeit.jpg',
        ));

        Lection::create(array(
            'id' => 4,
            'name' => 'Jean-Jacques Rousseau',
            'author' => 'Prof. Dr. Rainer Bolle',
            'contact' => 'bolle@ph-karlsruhe.de',
            'authorized_editors' => ["root"],
            'image_path' => 'storage/lections/jean_jacques_rousseau.jpg',
        ));

        Lection::create(array(
            'id' => 5,
            'name' => 'Johann Heinrich Pestalozzi',
            'author' => 'Prof. Dr. Gabriele Weigand',
            'contact' => 'weigand@ph-karlsruhe.de',
            'authorized_editors' => ["root"],
            'image_path' => 'storage/lections/johann_heinrich_pestalozzi.jpg',
        ));

        Lection::create(array(
            'id' => 6,
            'name' => 'Wilhelm von Humboldt',
            'author' => 'Prof. Dr. Gabriele Weigand',
            'contact' => 'weigand@ph-karlsruhe.de',
            'authorized_editors' => ["root"],
            'image_path' => 'storage/lections/wilhelm_von_humboldt.jpg',
        ));

        Lection::create(array(
            'id' => 7,
            'name' => 'Erziehung und Unterricht',
            'author' => 'Dr. Albert Berger',
            'contact' => 'berger@ph-karlsruhe.de',
            'authorized_editors' => ["root"],
            'image_path' => 'storage/lections/erziehung_und_unterricht.jpg',
        ));

        Lection::create(array(
            'id' => 8,
            'name' => 'Heterogenität',
            'author' => 'Dr. Albert Berger',
            'contact' => 'berger@ph-karlsruhe.de',
            'authorized_editors' => ["root"],
            'image_path' => 'storage/lections/heterogenitaet.jpg',
        ));

        Lection::create(array(
            'id' => 9,
            'name' => 'Wozu ist die Bildung da?',
            'author' => 'Apl. Prof. Dr. Timo Hoyer',
            'contact' => 'hoyer@ph-karlsruhe.de',
            'authorized_editors' => ["root"],
            'image_path' => 'storage/lections/wozu_ist_die_bildung_da.jpg',
        ));

        Lection::create(array(
            'id' => 10,
            'name' => 'Bildung und Glück',
            'author' => 'Apl. Prof. Dr. Timo Hoyer',
            'contact' => 'hoyer@ph-karlsruhe.de',
            'authorized_editors' => ["root"],
            'image_path' => 'storage/lections/bildung_und_gluek.jpg',
        ));

        Lection::create(array(
            'id' => 11,
            'name' => 'Bildung und Gerechtigkeit',
            'author' => 'Apl. Prof. Dr. Timo Hoyer',
            'contact' => 'hoyer@ph-karlsruhe.de',
            'authorized_editors' => ["root"],
            'image_path' => 'storage/lections/bildung_und_gerechtigkeit.jpg',
        ));
    }
}
