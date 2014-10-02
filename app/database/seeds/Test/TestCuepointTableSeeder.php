<?php

use Illuminate\Database\Seeder;
use Synthesise\Cuepoint;

class TestCuepointTableSeeder extends Seeder {

	public function run()
	{
		DB::table('cuepoints')->delete();

		// NOTE ANTIKE -------------------------------------------------

		Cuepoint::create(array(
			'cuepoint' => '100',
			'video_videoname' => 'Sozialgeschichte 1',
			'content' => 'Fähnchen 1'
		));

		Cuepoint::create(array(
			'cuepoint' => '300',
			'video_videoname' => 'Sozialgeschichte 1',
			'content' => 'Fähnchen 2'
		));

		Cuepoint::create(array(
			'cuepoint' => '700',
			'video_videoname' => 'Sozialgeschichte 1',
			'content' => 'Fähchen 3'
		));

	}
}
