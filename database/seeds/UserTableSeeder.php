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
			'password' => Hash::make('etpM'),
			'firstname' => 'Timo',
			'lastname' => 'Hoyer',
			'role' => 'Admin'
		]);

		User::create([
			'id' => 2,
			'username' => 'mundtka',
			'password' => Hash::make('etpM'),
			'role' => 'Admin'
		]);

		User::create([
			'id' => 3,
			'username' => 'weigandka',
			'password' => Hash::make('etpM'),
			'firstname' => 'Gabriele',
			'lastname' => 'Weigand',
			'role' => 'Teacher'
		]);

		User::create([
			'id' => 4,
			'username' => 'bolleka',
			'password' => Hash::make('etpM'),
			'firstname' => 'Rainer',
			'lastname' => 'Bolle',
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

	}
}
