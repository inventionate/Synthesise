<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class TestDatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('TestUserTableSeeder');
		$this->command->info('Test User table seeded!');

		$this->call('TestFaqTableSeeder');
		$this->command->info('Test FAQ table seeded!');

		$this->call('TestCuepointTableSeeder');
		$this->command->info('Test Cuepoint table seeded!');

		$this->call('TestNoteTableSeeder');
		$this->command->info('Test Note table seeded!');

		$this->call('TestVideoTableSeeder');
		$this->command->info('Test Video table seeded!');

		$this->call('TestPaperTableSeeder');
		$this->command->info('Test Paper table seeded!');

	}

}
