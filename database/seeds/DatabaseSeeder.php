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

		$this->call('CuepointTableSeeder');
		$this->command->info('Cuepoint table seeded!');

		$this->call('FaqTableSeeder');
		$this->command->info('FAQ table seeded!');

		$this->call('LectionSectionTableSeeder');
		$this->command->info('Lection_Section table seeded!');

		$this->call('LectionTableSeeder');
		$this->command->info('Lection table seeded!');

		$this->call('NoteTableSeeder');
		$this->command->info('Note table seeded!');

		$this->call('PaperTableSeeder');
		$this->command->info('Paper table seeded!');

		$this->call('SectionTableSeeder');
		$this->command->info('Section table seeded!');

		$this->call('SeminarTableSeeder');
		$this->command->info('Seminar table seeded!');

		$this->call('SeminarUserTableSeeder');
		$this->command->info('Seminar_User table seeded!');

		$this->call('SequenceTableSeeder');
		$this->command->info('Sequence table seeded!');

		$this->call('UserTableSeeder');
		$this->command->info('User table seeded!');

		$this->call('InfoblockTableSeeder');
		$this->command->info('Infoblock table seeded!');

	}

}
