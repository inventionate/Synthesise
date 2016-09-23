<?php

use Illuminate\Database\Seeder;

use Synthesise\User;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->delete();

        User::create([
            'id' => 1,
            'username' => 'root',
            'password' => Hash::make('admin'),
            'firstname' => 'root',
            'lastname' => 'user',
            'role' => 'Admin',
            'email' => 'admin@ph-karlsruhe.de',
        ]);

        User::create([
            'id' => 2,
            'username' => 'student',
            'password' => Hash::make('etpM'),
            'firstname' => 'Student',
            'lastname' => 'Benutzer',
            'role' => 'Student',
            'email' => 'student@stud.ph-karlsruhe.de',
        ]);

        User::create([
            'id' => 3,
            'username' => 'mentor',
            'password' => Hash::make('etpM'),
            'firstname' => 'Mentor',
            'lastname' => 'Benutzer',
            'role' => 'Mentor',
            'email' => 'mentor@stud.ph-karlsruhe.de',
        ]);

        User::create([
            'id' => 4,
            'username' => 'dozent',
            'password' => Hash::make('etpM'),
            'firstname' => 'Dozent',
            'lastname' => 'Benutzer',
            'role' => 'Teacher',
            'email' => 'dozent@ph-karlsruhe.de',
        ]);

    }
}
