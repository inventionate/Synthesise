<?php

use Illuminate\Database\Seeder;
use Synthesise\Paper;

class TestPaperTableSeeder extends Seeder {

	public function run()
	{
		DB::table('papers')->delete();

		Paper::create(array(
			'id' => 1,
			'papername' => 'Zeit-Raum Studium!',
			'author' => 'Fabian Mundt',
			'video_videoname' => 'Sozialgeschichte 1',
		));
	}

}
