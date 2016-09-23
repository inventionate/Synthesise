<?php

use Illuminate\Database\Seeder;

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

        Paper::create(array(
            'id' => 1,
            'papername' => 'Ethik und Moralerziehung',
            'author' => 'Timo Hoyer',
            'video_videoname' => 'Griechisch-römische Antike',
        ));

        // MATHEMATICS

        Paper::create(array(
            'id' => 1,
            'papername' => 'Ethik und Moralerziehung',
            'author' => 'Timo Hoyer',
            'video_videoname' => 'Griechisch-römische Antike',
        ));
        
        $table->string('seminarname', 256);
        $table->string('subject', 256);
        $table->string('author', 128);
        $table->boolean('online');
        $table->date('available_from');
        $table->date('available_to');
    }
}
