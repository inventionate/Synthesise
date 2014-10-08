<?php

use Illuminate\Database\Seeder;
use Synthesise\Message;

class TestMessageTableSeeder extends Seeder {

	public function run()
	{
		DB::table('messages')->delete();

		Message::create([
			'message' => 'Das ist eine normale Informationsnachricht.',
			'type' => 'info'
		]);

		Message::create([
			'message' => 'Das ist eine warnende Informationsnachricht.',
			'type' => 'warning'
		]);

		Message::create([
			'message' => 'Das ist eine kritische Informationsnachricht.',
			'type' => 'danger'
		]);
	}
}
