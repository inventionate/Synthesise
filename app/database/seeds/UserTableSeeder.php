<?php

class UserTableSeeder extends Seeder {

	public function run()
	{
		DB::table('users')->delete();

		User::create(array(
			'id' => 1,
			'username' => 'fab',
			'password' => Hash::make('etpM'),
			'firstname' => 'Fabian',
			'lastname' => 'Mundt',
			'role' => 'Student'
		));	

		User::create(array(
			'id' => 2,
			'username' => 'mundtka',
			'password' => Hash::make('etpM'),
			'firstname' => 'Fabian',
			'lastname' => 'Mundt',
			'role' => 'Teacher'
		));	

		User::create(array(
			'id' => 3,
			'username' => 'hartmannka',
			'password' => Hash::make('hartmannka'),
			'firstname' => 'Mutfried',
			'lastname' => 'Hartmann',
			'role' => 'Teacher'
		));	

		User::create(array(
			'id' => 4,
			'username' => 'bolleka',
			'password' => Hash::make('bolleka'),
			'firstname' => 'Rainer',
			'lastname' => 'Bolle',
			'role' => 'Teacher'
		));	

		User::create(array(
			'id' => 7,
			'username' => 'hoyerka',
			'password' => Hash::make('etpM'),
			'firstname' => 'Timo',
			'lastname' => 'Hoyer',
			'role' => 'Teacher'
		));	

		User::create(array(
			'id' => 9,
			'username' => 'weigandka',
			'password' => Hash::make('weigandka'),
			'firstname' => 'Gabriele',
			'lastname' => 'Weigand',
			'role' => 'Teacher'
		));	
		
	}
}