<?php

use Illuminate\Database\Seeder;
use Synthesise\User;

class TestUserTableSeeder extends Seeder {

	public function run()
	{
		DB::table('users')->delete();

		User::create(array(
			'id' => 1,
			'username' => 'studentka',
			'password' => Hash::make('Zelda'),
			'firstname' => 'Test',
			'lastname' => 'Student',
			'role' => 'Student'
		));

		User::create(array(
			'id' => 2,
			'username' => 'teacherka',
			'password' => Hash::make('Hyrule'),
			'firstname' => 'Test',
			'lastname' => 'Teacher',
			'role' => 'Teacher'
		));

		User::create(array(
			'id' => 3,
			'username' => 'adminka',
			'password' => Hash::make('Link'),
			'firstname' => 'Test',
			'lastname' => 'Admin',
			'role' => 'Admin'
		));

	}
}
