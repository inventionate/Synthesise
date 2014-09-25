<?php

use Illuminate\Database\Seeder;
use Synthesise\Note;

class TestNoteTableSeeder extends Seeder {

	public function run()
	{
		DB::table('notes')->delete();

		Note::create(array(
			'note' => Crypt::encrypt('Das ist die ERSTE Notiz.'),
			'user_id' => 1,
			'cuepoint_id' => 1,
			'video_videoname' => 'Sozialgeschichte 1'
		));	

		Note::create(array(
			'note' => Crypt::encrypt('Das ist die ZWEITE Notiz.'),
			'user_id' => 1,
			'cuepoint_id' => 2,
			'video_videoname' => 'Sozialgeschichte 1'
		));

		Note::create(array(
			'note' => Crypt::encrypt('Das ist die DRITTE Notiz.'),
			'user_id' => 2,
			'cuepoint_id' => 1,
			'video_videoname' => 'Sozialgeschichte 1'
		));
	}

}
