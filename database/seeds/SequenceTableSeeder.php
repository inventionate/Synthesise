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
            'path' => 'storage/videos/055e606f31e45053192d60fcec640130.mp4',
            'lection_name' => 'Griechisch-römische Antike'
        ));

        Sequence::create(array(
            'id' => 2,
            'name' => null,
            'position' => 1,
            'video' => true,
            'path' => 'storage/videos/6b384313746cfe0243592c0c0d094399.mp4',
            'lection_name' => 'Mittelalter'
        ));

        Sequence::create(array(
            'id' => 3,
            'name' => null,
            'position' => 1,
            'video' => true,
            'path' => 'storage/videos/316e8b04e825be982e29854374cea032.mp4',
            'lection_name' => 'Frühe Neuzeit'
        ));

        Sequence::create(array(
            'id' => 4,
            'name' => null,
            'position' => 1,
            'video' => true,
            'path' => 'storage/videos/cb56341f4e61185dac56e0f88e92b451.mp4',
            'lection_name' => 'Jean-Jacques Rousseau'
        ));

        Sequence::create(array(
            'id' => 5,
            'name' => null,
            'position' => 1,
            'video' => true,
            'path' => 'storage/videos/659e55231fb033b8356b44f700f9a7c2.mp4',
            'lection_name' => 'Johann Heinrich Pestalozzi'
        ));

        Sequence::create(array(
            'id' => 6,
            'name' => null,
            'position' => 1,
            'video' => true,
            'path' => 'storage/videos/cb672d6f51492b5e240c831e0fe9c6c4.mp4',
            'lection_name' => 'Wilhelm von Humboldt'
        ));

        Sequence::create(array(
            'id' => 7,
            'name' => null,
            'position' => 1,
            'video' => true,
            'path' => 'storage/videos/018fc7353a426fa7f0c3cd83956ea6bc.mp4',
            'lection_name' => 'Erziehung und Unterricht'
        ));

        Sequence::create(array(
            'id' => 8,
            'name' => null,
            'position' => 1,
            'video' => true,
            'path' => 'storage/videos/f9224ae1c22eb7a0023a84a40cd188a7.mp4',
            'lection_name' => 'Heterogenität'
        ));

        Sequence::create(array(
            'id' => 9,
            'name' => null,
            'position' => 1,
            'video' => true,
            'path' => 'storage/videos/5a56d986c43cb99f202f76b47b1c18b0.mp4',
            'lection_name' => 'Wozu ist die Bildung da?'
        ));

        Sequence::create(array(
            'id' => 10,
            'name' => null,
            'position' => 1,
            'video' => true,
            'path' => 'storage/videos/341f71e21ea6993868daad38184d7c3c.mp4',
            'lection_name' => 'Bildung und Glück'
        ));

        Sequence::create(array(
            'id' => 11,
            'name' => null,
            'position' => 1,
            'video' => true,
            'path' => 'storage/videos/6c02637621c70f4a7738de9cc471cff4.mp4',
            'lection_name' => 'Bildung und Gerechtigkeit'
        ));

        Sequence::create(array(
            'id' => 12,
            'name' => null,
            'position' => 1,
            'video' => true,
            'path' => 'storage/videos/78e76f1db464ac8c65b0d57ba9c9f278.mp4',
            'lection_name' => 'Erziehung und Bildung als Gegenstand wissenschaftlicher Praxis'
        ));

        Sequence::create(array(
            'id' => 13,
            'name' => null,
            'position' => 1,
            'video' => true,
            'path' => 'storage/videos/656bb764fdc5f6489b54863fee8b65b4.mp4',
            'lection_name' => 'Was meint Erziehung?'
        ));

        Sequence::create(array(
            'id' => 14,
            'name' => null,
            'position' => 1,
            'video' => true,
            'path' => 'storage/videos/abac9d002bed1107e503fb9fffaf4137.mp4',
            'lection_name' => 'Bildung gegen Intoleranz und Erziehung zu Toleranz'
        ));

    }
}
