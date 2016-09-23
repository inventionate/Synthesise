<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		$this->call('UserTableSeeder');
		$this->command->info('User table seeded!');

		$this->call('FaqTableSeeder');
		$this->command->info('FAQ table seeded!');

		$this->call('CuepointTableSeeder');
		$this->command->info('Cuepoint table seeded!');

		$this->call('NoteTableSeeder');
		$this->command->info('Note table seeded!');

		$this->call('VideoTableSeeder');
		$this->command->info('Video table seeded!');

		$this->call('PaperTableSeeder');
		$this->command->info('Paper table seeded!');

		$this->call('SeminarTableSeeder');
		$this->command->info('Seminar table seeded!');

		$this->call('SeminarVideoTableSeeder');
		$this->command->info('Seminar_Video table seeded!');

		$this->call('SeminarUserTableSeeder');
		$this->command->info('Seminar_User table seeded!');

	}

}
