<?php

use Illuminate\Database\Seeder;
use Synthesise\User;

class UserTableSeeder extends Seeder {

	public function run()
	{
		DB::table('users')->delete();

		User::create(array(
			'id' => 1,
			'username' => 'hoyerka',
			'password' => Hash::make('etpM'),
			'firstname' => 'Timo',
			'lastname' => 'Hoyer',
			'role' => 'Admin'
		));

		User::create(array(
			'id' => 2,
			'username' => 'mundtka',
			'password' => Hash::make('etpM'),
			'firstname' => 'Fabian',
			'lastname' => 'Mundt',
			'role' => 'Admin'
		));

		User::create(array(
			'id' => 3,
			'username' => 'weigandka',
			'password' => Hash::make('etpM'),
			'firstname' => 'Gabriele',
			'lastname' => 'Weigand',
			'role' => 'Teacher'
		));

		User::create(array(
			'id' => 4,
			'username' => 'hartmannka',
			'password' => Hash::make('etpM'),
			'firstname' => 'Mutfried',
			'lastname' => 'Hartmann',
			'role' => 'Teacher'
		));

		User::create(array(
			'id' => 5,
			'username' => 'bolleka',
			'password' => Hash::make('etpM'),
			'firstname' => 'Rainer',
			'lastname' => 'Bolle',
			'role' => 'Teacher'
		));

		User::create(array(
			'id' => 6,
			'username' => 'student',
			'password' => Hash::make('etpM'),
			'firstname' => 'Test',
			'lastname' => 'Benutzer',
			'role' => 'Student'
		));

		User::create(array(
			'id' => 7,
			'username' => 'mentor',
			'password' => Hash::make('etpM'),
			'firstname' => 'Test',
			'lastname' => 'Benutzer',
			'role' => 'Teacher'
		));

	}
}
