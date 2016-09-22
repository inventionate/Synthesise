<?php

use Illuminate\Database\Seeder;
use Synthesise\User;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->delete();

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
        
    }
}
