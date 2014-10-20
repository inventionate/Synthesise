<?php

use Illuminate\Database\Seeder;
use Synthesise\User;

class UserTableSeeder extends Seeder {

	public function run()
	{
		DB::table('users')->delete();

		User::create([
			'id' => 1,
			'username' => 'hoyerka',
			'role' => 'Admin'
		]);

		User::create([
			'id' => 2,
			'username' => 'mundtka',
			'role' => 'Admin'
		]);

		User::create([
			'id' => 3,
			'username' => 'weigandka',
			'role' => 'Teacher'
		]);

		User::create([
			'id' => 4,
			'username' => 'bolleka',
			'role' => 'Teacher'
		]);

		User::create([
			'id' => 5,
			'username' => 'student',
			'password' => Hash::make('etpM'),
			'firstname' => 'Test',
			'lastname' => 'Benutzer',
			'role' => 'Student'
		]);

		User::create([
			'id' => 6,
			'username' => 'mentor',
			'password' => Hash::make('etpM'),
			'firstname' => 'Test',
			'lastname' => 'Benutzer',
			'role' => 'Teacher'
		]);

		User::create([
			'id' => 7,
			'username' => 'wehnerka',
			'role' => 'Teacher'
		]);

		User::create([
			'id' => 8,
			'username' => 'wulfka',
			'role' => 'Teacher'
		]);

		User::create([
			'id' => 9,
			'username' => 'dummertka',
			'role' => 'Teacher'
		]);


		/**
		 * Mentoren über Array einlesen.
		 *
		 * @todo Diesen Prozess über das Backend vereinfachen (CSV aus LSF o.ä. hochladen).
		 */
		require storage_path() . '/app/users/mentoren.php';

		$num = 0;

		foreach ( $mentoren as $mentor )
		{
			User::create([
				'id' => 50 + $num,
				'username' => $mentor,
				'role' => 'Teacher'
			]);
			$num ++;
		}

		/**
		* Studierende über Array einlesen.
		 *
		 * @todo Diesen Prozess über das Backend vereinfachen (CSV aus LSF o.ä. hochladen).
		 */
		require storage_path() . '/app/users/studierende.php';

		$num = 0;

		foreach ( $studierende as $student )
		{
			User::create([
				'id' => 100 + $num,
				'username' => $student,
				'role' => 'Student'
			]);
			$num ++;
		}


	}
}
