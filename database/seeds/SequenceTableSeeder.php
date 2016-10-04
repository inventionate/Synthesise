<?php

use Illuminate\Database\Seeder;

use Synthesise\Sequence;

class SequenceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('sequences')->delete();

        // AHEW

        Sequence::create(array(
            'id' => 1,
            'name' => null,
            'position' => 1,
            'video' => true,
            'path' => '',
            'lection_name' => 'Griechisch-römische Antike'
        ));

        Sequence::create(array(
            'id' => 2,
            'name' => null,
            'position' => 1,
            'video' => true,
            'path' => '',
            'lection_name' => 'Mittelalter'
        ));

        Sequence::create(array(
            'id' => 3,
            'name' => null,
            'position' => 1,
            'video' => true,
            'path' => '',
            'lection_name' => 'Frühe Neuzeit'
        ));

        Sequence::create(array(
            'id' => 4,
            'name' => null,
            'position' => 1,
            'video' => true,
            'path' => '',
            'lection_name' => 'Jean-Jacques Rousseau'
        ));

        Sequence::create(array(
            'id' => 5,
            'name' => null,
            'position' => 1,
            'video' => true,
            'path' => '',
            'lection_name' => 'Johann Heinrich Pestalozzi'
        ));

        Sequence::create(array(
            'id' => 6,
            'name' => null,
            'position' => 1,
            'video' => true,
            'path' => '',
            'lection_name' => 'Wilhelm von Humboldt'
        ));

        Sequence::create(array(
            'id' => 7,
            'name' => null,
            'position' => 1,
            'video' => true,
            'path' => '',
            'lection_name' => 'Erziehung und Unterricht'
        ));

        Sequence::create(array(
            'id' => 8,
            'name' => null,
            'position' => 1,
            'video' => true,
            'path' => '',
            'lection_name' => 'Heterogenität'
        ));

        Sequence::create(array(
            'id' => 9,
            'name' => null,
            'position' => 1,
            'video' => true,
            'path' => '',
            'lection_name' => 'Wozu ist die Bildung da?'
        ));

        Sequence::create(array(
            'id' => 10,
            'name' => null,
            'position' => 1,
            'video' => true,
            'path' => '',
            'lection_name' => 'Bildung und Glück'
        ));

        Sequence::create(array(
            'id' => 11,
            'name' => null,
            'position' => 1,
            'video' => true,
            'path' => '',
            'lection_name' => 'Bildung und Gerechtigkeit'
        ));

    }
}
