<?php

use Illuminate\Database\Seeder;
use Synthesise\User;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->delete();

        User::create([
            'username' => 'hoyerka',
            'role' => 'Admin',
        ]);

        User::create([
            'username' => 'mundtka',
            'role' => 'Admin',
        ]);

        User::create([
            'username' => 'weigandka',
            'role' => 'Teacher',
        ]);

        User::create([
            'username' => 'bolleka',
            'role' => 'Teacher',
        ]);

        User::create([
            'username' => 'student',
            'password' => Hash::make('etpM'),
            'firstname' => 'Test',
            'lastname' => 'Benutzer',
            'role' => 'Student',
            'email' => 'student@stud.ph-karlsruhe.de',
        ]);

        User::create([
            'username' => 'mentor',
            'password' => Hash::make('etpM'),
            'firstname' => 'Test',
            'lastname' => 'Benutzer',
            'role' => 'Teacher',
            'email' => 'mentor@stud.ph-karlsruhe.de',
        ]);

        User::create([
            'username' => 'dozent',
            'password' => Hash::make('etpM'),
            'firstname' => 'Test',
            'lastname' => 'Benutzer',
            'role' => 'Admin',
            'email' => 'dozent@ph-karlsruhe.de',
        ]);

        /**
         * Mentoren über Array einlesen.
         *
         * @todo Diesen Prozess über das Backend vereinfachen (CSV aus LSF o.ä. hochladen).
         */
        require storage_path().'/app/users/mentoren.php';

        foreach ($mentoren as $mentor) {
            User::create([
                'username' => $mentor,
                'role' => 'Teacher',
            ]);
        }

        /**
         * Studierende über Array einlesen.
         *
         * @todo Diesen Prozess über das Backend vereinfachen (CSV aus LSF o.ä. hochladen).
         */
        require storage_path().'/app/users/studierende.php';

        foreach ($studierende as $student) {
            User::create([
                'username' => $student,
                'role' => 'Student',
            ]);
        }
    }
}
