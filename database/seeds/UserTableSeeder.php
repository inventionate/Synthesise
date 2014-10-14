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
			'firstname' => '',
			'lastname' => '',
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


		/////////////// MENTOREN


		// @todo den Importvorgang verbessern!

		$localpath = storage_path() . '/app/users/mentoren.csv';

		if (file_exists($localpath))
		{
			$accounts = [];
			$file = fopen($localpath, "r");
			while ($line = fgetcsv($file, 1000, ';'))
			{
				array_push($accounts, $line);
			}
			fclose($file);

			// Schleife durch die Benutzer IN DIESEM FALL MENTOREN

			for ($i = 1; $i < count($accounts); $i++ )
			{
				User::create([
					'id' => 49 + $i,
					'username' => utf8_encode($accounts[$i][4]),
					'password' => '',
					'firstname' => utf8_encode($accounts[$i][1]),
					'lastname' => utf8_encode($accounts[$i][2]),
					'role' => 'Teacher'
				]);
			}
		}


		// /////////////// STUDIERENDE
		// DIE ID AB 100 BEGINNEN LASSEN!!!!
		//
		// if (App::environment() === 'local')
		// {
		// 		$localpath = '/Users/fabianmundt/Dropbox/Inventionate/Projekte/Synthesise 2.0/app/database/seeds/csv/studierende.csv';
		// }
		// elseif (App::environment() === 'production')
		// {
		// 		$localpath = '/home/fmundt/synthesise/app/database/seeds/csv/studierende.csv';
		// }
		//
		// if (file_exists($localpath)) {
		// 	$accounts = array();
		// 	$file = fopen($localpath, "r");
		// 	while ($line = fgetcsv($file, 1000, ';')) {
		// 		array_push($accounts, $line);
		// 	}
		// 	fclose($file);
		//
		// 	// Schleife durch die Benutzer IN DIESEM FALL MENTOREN
		//
		// 	for ($i = 1; $i < count($accounts); $i++ ) {
		// 		User::create([
		// 			'username' => strtolower(utf8_encode($accounts[$i][4])),
		// 			'password' => Hash::make(strtolower(utf8_encode($accounts[$i][4]) . substr($accounts[$i][12],4,3)) ),
		// 			'firstname' => utf8_encode($accounts[$i][1]),
		// 			'lastname' => utf8_encode($accounts[$i][2]),
		// 			'role' => 'Student'
		// 		));
		// 	}
		// }

	}
}
