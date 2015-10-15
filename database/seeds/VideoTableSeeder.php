<?php

use Illuminate\Database\Seeder;
use Synthesise\Video;

class VideoTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('videos')->delete();

        Video::create(array(
            'id' => 1,
            'videoname' => 'Griechisch-römische Antike',
            'section' => 'Sozialgeschichte der Erziehung und Bildung',
            'author' => 'Apl. Prof. Dr. Timo Hoyer',
            'online' => '1',
            'sequence_id' => 1,
            'sequence_name' => null,
            'available_from' => '2015-10-21',
            'available_to' => '2016-02-17',
        ));

        Video::create(array(
            'id' => 2,
            'videoname' => 'Mittelalter',
            'section' => 'Sozialgeschichte der Erziehung und Bildung',
            'author' => 'Apl. Prof. Dr. Timo Hoyer',
            'online' => '1',
            'sequence_id' => 1,
            'sequence_name' => null,
            'available_from' => '2015-10-28',
            'available_to' => '2016-02-17',
        ));

        Video::create(array(
            'id' => 3,
            'videoname' => 'Frühe Neuzeit',
            'section' => 'Sozialgeschichte der Erziehung und Bildung',
            'author' => 'Apl. Prof. Dr. Timo Hoyer',
            'online' => '1',
            'sequence_id' => 1,
            'sequence_name' => null,
            'available_from' => '2015-11-04',
            'available_to' => '2016-02-17',
        ));

        Video::create(array(
            'id' => 4,
            'videoname' => 'Jean-Jacques Rousseau',
            'section' => 'Ideen- und Personengeschichte der Pädagogik',
            'author' => 'Prof. Dr. Rainer Bolle',
            'online' => '1',
            'sequence_id' => 1,
            'sequence_name' => null,
            'available_from' => '2015-11-11',
            'available_to' => '2016-02-17',
        ));

        Video::create(array(
            'id' => 5,
            'videoname' => 'Johann Heinrich Pestalozzi',
            'section' => 'Ideen- und Personengeschichte der Pädagogik',
            'author' => 'Prof. Dr. Gabriele Weigand',
            'online' => '1',
            'sequence_id' => 1,
            'sequence_name' => null,
            'available_from' => '2015-11-18',
            'available_to' => '2016-02-17',
        ));

        Video::create(array(
            'id' => 6,
            'videoname' => 'Wilhelm von Humboldt',
            'section' => 'Ideen- und Personengeschichte der Pädagogik',
            'author' => 'Prof. Dr. Gabriele Weigand',
            'online' => '1',
            'sequence_id' => 1,
            'sequence_name' => null,
            'available_from' => '2015-11-25',
            'available_to' => '2016-02-17',
        ));

        Video::create(array(
            'id' => 7,
            'videoname' => 'Erziehung und Unterricht',
            'section' => 'Erziehung und Schule',
            'author' => 'Dr. Albert Berger',
            'online' => '1',
            'sequence_id' => 1,
            'sequence_name' => null,
            'available_from' => '2015-12-02',
            'available_to' => '2016-02-17',
        ));

        Video::create(array(
            'id' => 8,
            'videoname' => 'Heterogenität',
            'section' => 'Erziehung und Schule',
            'author' => 'Dr. Albert Berger',
            'online' => '1',
            'sequence_id' => 1,
            'sequence_name' => null,
            'available_from' => '2015-12-9',
            'available_to' => '2016-02-17',
        ));

        Video::create(array(
            'id' => 9,
            'videoname' => 'Wozu ist die Bildung da?',
            'section' => 'Bildung – Glück – Gerechtigkeit',
            'author' => 'Apl. Prof. Dr. Timo Hoyer',
            'online' => '1',
            'sequence_id' => 1,
            'sequence_name' => null,
            'available_from' => '2015-12-16',
            'available_to' => '2016-02-17',
        ));

        Video::create(array(
            'id' => 10,
            'videoname' => 'Bildung und Glück',
            'section' => 'Bildung – Glück – Gerechtigkeit',
            'author' => 'Apl. Prof. Dr. Timo Hoyer',
            'online' => '1',
            'sequence_id' => 1,
            'sequence_name' => null,
            'available_from' => '2015-12-23',
            'available_to' => '2016-02-17',
        ));

        Video::create(array(
            'id' => 11,
            'videoname' => 'Bildung und Gerechtigkeit',
            'section' => 'Bildung – Glück – Gerechtigkeit',
            'author' => 'Apl. Prof. Dr. Timo Hoyer',
            'online' => '1',
            'sequence_id' => 1,
            'sequence_name' => null,
            'available_from' => '2015-12-31',
            'available_to' => '2014-02-28',
        ));
    }
}
