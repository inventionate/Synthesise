<?php

class UserTableSeeder extends Seeder {

	public function run()
	{
		DB::table('users')->delete();

		User::create(array(
			'id' => 1,
			'username' => 'Zelda',
			'password' => Hash::make('Hyrule'),
			'firstname' => 'Test',
			'lastname' => 'User',
			'role' => 'Student',
			'permissions' => 'all'
		));	
		
		User::create(array(
			'id' => 2,
			'username' => 'hoyerka',
			'password' => Hash::make('etpM'),
			'firstname' => 'Timo',
			'lastname' => 'Hoyer',
			'role' => 'Teacher'
		));	

		User::create(array(
			'id' => 3,
			'username' => 'mundtka',
			'password' => Hash::make('etpM'),
			'firstname' => 'Fabian',
			'lastname' => 'Mundt',
			'role' => 'Teacher'
		));	

		User::create(array(
			'id' => 4,
			'username' => 'weigandka',
			'password' => Hash::make('etpM'),
			'firstname' => 'Gabriele',
			'lastname' => 'Weigand',
			'role' => 'Teacher'
		));	

		User::create(array(
			'id' => 5,
			'username' => 'hartmannka',
			'password' => Hash::make('etpM'),
			'firstname' => 'Mutfried',
			'lastname' => 'Hartmann',
			'role' => 'Teacher'
		));	

		User::create(array(
			'id' => 6,
			'username' => 'bolleka',
			'password' => Hash::make('etpM'),
			'firstname' => 'Rainer',
			'lastname' => 'Bolle',
			'role' => 'Teacher'
		));	


		
	}
}