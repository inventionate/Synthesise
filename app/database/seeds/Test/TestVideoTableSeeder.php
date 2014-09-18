<?php

use Illuminate\Database\Seeder;
use Synthesise\Video;

class TestVideoTableSeeder extends Seeder {

	public function run()
	{
		DB::table('videos')->delete();

		Video::create(array(
			'id' => 99,
			'videoname' => 'Sozialgeschichte 1',
			'section' => 'Sozialgeschichte der Menschheit',
			'author' => 'Will Turner',
			'online' => '0',
			'available_from' => '2000-09-10',
			'available_to' => '3000-02-08'
		));

	}

}
