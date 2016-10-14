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

        // MATH

        Sequence::create(array(
            'id' => 15,
            'name' => 'Woher kommen Zahlen',
            'position' => 1,
            'video' => true,
            'path' => 'storage/videos/24a14465bc90ffbb6ed7a60e789d06a7.mp4',
            'lection_name' => 'Zahldarstellungen und Stellenwertsysteme'
        ));

        Sequence::create(array(
            'id' => 16,
            'name' => 'Das römische Zahlzeichensystem',
            'position' => 2,
            'video' => true,
            'path' => 'storage/videos/36e4019e356a846775f268e364d836b2.mp4',
            'lection_name' => 'Zahldarstellungen und Stellenwertsysteme'
        ));

        Sequence::create(array(
            'id' => 17,
            'name' => 'Bündeln',
            'position' => 3,
            'video' => true,
            'path' => 'storage/videos/dbb425ad595a102cfe96b6f11de64a2f.mp4',
            'lection_name' => 'Zahldarstellungen und Stellenwertsysteme'
        ));

        Sequence::create(array(
            'id' => 18,
            'name' => 'Stellenwertschreibweise',
            'position' => 4,
            'video' => true,
            'path' => 'storage/videos/59dbf06f024453fb8b33b9ec2f49b0d6.mp4',
            'lection_name' => 'Zahldarstellungen und Stellenwertsysteme'
        ));

        Sequence::create(array(
            'id' => 19,
            'name' => 'g-adische Systeme',
            'position' => 5,
            'video' => true,
            'path' => 'storage/videos/fa654be4cacf9791ce4f971a2ed11ad3.mp4',
            'lection_name' => 'Zahldarstellungen und Stellenwertsysteme'
        ));

        Sequence::create(array(
            'id' => 20,
            'name' => 'Folgerungen',
            'position' => 6,
            'video' => true,
            'path' => 'storage/videos/2785ac37318860005e69d4885d43cd2f.mp4',
            'lection_name' => 'Zahldarstellungen und Stellenwertsysteme'
        ));


        Sequence::create(array(
            'id' => 21,
            'name' => 'Stellenwertsysteme',
            'position' => 1,
            'video' => true,
            'path' => 'storage/videos/917be185dcd5cbc9e457b776c9f6b235.mp4',
            'lection_name' => 'Addition und Subtraktion'
        ));

        Sequence::create(array(
            'id' => 22,
            'name' => 'Zahlsystemwechsel',
            'position' => 2,
            'video' => true,
            'path' => 'storage/videos/32de4404a2b74c5aba22974bb1772eda.mp4',
            'lection_name' => 'Addition und Subtraktion'
        ));

        Sequence::create(array(
            'id' => 23,
            'name' => 'Zahlnamensgebung',
            'position' => 3,
            'video' => true,
            'path' => 'storage/videos/5a7c3f170a42a0a30fef35c2d66dba84.mp4',
            'lection_name' => 'Addition und Subtraktion'
        ));

        Sequence::create(array(
            'id' => 24,
            'name' => 'Interpretation der Stellenwertschreibweise',
            'position' => 4,
            'video' => true,
            'path' => 'storage/videos/63e008c1d426122bb868df1dc98835ba.mp4',
            'lection_name' => 'Addition und Subtraktion'
        ));

        Sequence::create(array(
            'id' => 25,
            'name' => 'Addition in Stellenwertsystemen',
            'position' => 5,
            'video' => true,
            'path' => 'storage/videos/698533015b259e871672c41c4125ae83.mp4',
            'lection_name' => 'Addition und Subtraktion'
        ));

        Sequence::create(array(
            'id' => 26,
            'name' => 'Subtration in Stellenwertsystemen',
            'position' => 6,
            'video' => true,
            'path' => 'storage/videos/3735eb9da20c8e6fdb9ca51248f7ec01.mp4',
            'lection_name' => 'Addition und Subtraktion'
        ));


        Sequence::create(array(
            'id' => 27,
            'name' => 'Analyse der Multiplikation',
            'position' => 1,
            'video' => true,
            'path' => 'storage/videos/f944af5fc22221f9e65c608ba8a971fe.mp4',
            'lection_name' => 'Multiplikation und Division'
        ));

        Sequence::create(array(
            'id' => 28,
            'name' => 'Schriftliche Multiplikation',
            'position' => 2,
            'video' => true,
            'path' => 'storage/videos/731b6d2efda2584562c255c0c6448d5e.mp4',
            'lection_name' => 'Multiplikation und Division'
        ));

        Sequence::create(array(
            'id' => 29,
            'name' => 'Der Divisionsalgorithmus',
            'position' => 3,
            'video' => true,
            'path' => 'storage/videos/cbdafbbb39c34d8f6f5ad156fe0a680e.mp4',
            'lection_name' => 'Multiplikation und Division'
        ));

        Sequence::create(array(
            'id' => 30,
            'name' => 'Division nach Adam Ries',
            'position' => 4,
            'video' => true,
            'path' => 'storage/videos/3c869343bad33bce2e255fdb12008438.mp4',
            'lection_name' => 'Multiplikation und Division'
        ));

        Sequence::create(array(
            'id' => 31,
            'name' => 'Division im Hexadezimalsystem',
            'position' => 5,
            'video' => true,
            'path' => 'storage/videos/127a7eb83ffd4a4982cdbb0863ff204b.mp4',
            'lection_name' => 'Multiplikation und Division'
        ));

        Sequence::create(array(
            'id' => 32,
            'name' => 'Polynomdivision',
            'position' => 6,
            'video' => true,
            'path' => 'storage/videos/63dc62580f6ddf2a0dc1c667a10d5ac3.mp4',
            'lection_name' => 'Multiplikation und Division'
        ));


    }
}
