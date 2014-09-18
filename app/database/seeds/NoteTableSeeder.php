<?php

use Illuminate\Database\Seeder;
use Synthesise\Note;

class NoteTableSeeder extends Seeder {

	public function run()
	{
		DB::table('notes')->delete();
	}

}
