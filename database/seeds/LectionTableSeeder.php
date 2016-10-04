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
            'image_path' => 'storage/lections/05c0f9b0886187ff0aa358a28a220eab.jpg',
        ));

        Lection::create(array(
            'id' => 2,
            'name' => 'Mittelalter',
            'author' => 'Apl. Prof. Dr. Timo Hoyer',
            'contact' => 'hoyer@ph-karlsruhe.de',
            'authorized_editors' => ["root"],
            'image_path' => 'storage/lections/0c7ee036f23da8617aeb60f0fdeaafc6.jpg',
        ));

        Lection::create(array(
            'id' => 3,
            'name' => 'Frühe Neuzeit',
            'author' => 'Apl. Prof. Dr. Timo Hoyer',
            'contact' => 'hoyer@ph-karlsruhe.de',
            'authorized_editors' => ["root"],
            'image_path' => 'storage/lections/00b86a956babb9a1064c1a10ea0af402.jpg',
        ));

        Lection::create(array(
            'id' => 4,
            'name' => 'Jean-Jacques Rousseau',
            'author' => 'Prof. Dr. Rainer Bolle',
            'contact' => 'bolle@ph-karlsruhe.de',
            'authorized_editors' => ["root"],
            'image_path' => 'storage/lections/5bf570118e42fabc8f1983279cfd08ca.jpg',
        ));

        Lection::create(array(
            'id' => 5,
            'name' => 'Johann Heinrich Pestalozzi',
            'author' => 'Prof. Dr. Gabriele Weigand',
            'contact' => 'weigand@ph-karlsruhe.de',
            'authorized_editors' => ["root"],
            'image_path' => 'storage/lections/011b4914e0902130c9e024e0d7e9a698.jpg',
        ));

        Lection::create(array(
            'id' => 6,
            'name' => 'Wilhelm von Humboldt',
            'author' => 'Prof. Dr. Gabriele Weigand',
            'contact' => 'weigand@ph-karlsruhe.de',
            'authorized_editors' => ["root"],
            'image_path' => 'storage/lections/a91289c764dc78ee005e99c5347b1898.jpg',
        ));

        Lection::create(array(
            'id' => 7,
            'name' => 'Erziehung und Unterricht',
            'author' => 'Dr. Albert Berger',
            'contact' => 'berger@ph-karlsruhe.de',
            'authorized_editors' => ["root"],
            'image_path' => 'storage/lections/c4462b9da9f3d4c0345c08302cfc128f.jpg',
        ));

        Lection::create(array(
            'id' => 8,
            'name' => 'Heterogenität',
            'author' => 'Dr. Albert Berger',
            'contact' => 'berger@ph-karlsruhe.de',
            'authorized_editors' => ["root"],
            'image_path' => 'storage/lections/e592fbdded4303f3efb049a5355f9ccd.jpg',
        ));

        Lection::create(array(
            'id' => 9,
            'name' => 'Wozu ist die Bildung da?',
            'author' => 'Apl. Prof. Dr. Timo Hoyer',
            'contact' => 'hoyer@ph-karlsruhe.de',
            'authorized_editors' => ["root"],
            'image_path' => 'storage/lections/163c367720acbc5a8b2ae14620af33ee.jpg',
        ));

        Lection::create(array(
            'id' => 10,
            'name' => 'Bildung und Glück',
            'author' => 'Apl. Prof. Dr. Timo Hoyer',
            'contact' => 'hoyer@ph-karlsruhe.de',
            'authorized_editors' => ["root"],
            'image_path' => 'storage/lections/4277805616381a351892818adff76822.jpg',
        ));

        Lection::create(array(
            'id' => 11,
            'name' => 'Bildung und Gerechtigkeit',
            'author' => 'Apl. Prof. Dr. Timo Hoyer',
            'contact' => 'hoyer@ph-karlsruhe.de',
            'authorized_editors' => ["root"],
            'image_path' => 'storage/lections/fa910e021bb0d4d9427950cf6dc55908.jpg',
        ));
    }
}
