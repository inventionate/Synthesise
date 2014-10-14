<?php

$localpath = '/home/vagrant/synthesise/storage/app/users/mentoren2.csv';

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

  for ($i = 0; $i < count($accounts); $i++ )
  {

    echo utf8_encode($accounts[$i][2]);
    // User::create([
    //   'id' => 50 + $i,
    //   'username' => utf8_encode($accounts[$i][2]),
    //   'password' => Hash::make('etpM'),
    //   'firstname' => utf8_encode($accounts[$i][0]),
    //   'lastname' => utf8_encode($accounts[$i][1]),
    //   'role' => 'Teacher'
    // ]);
  }
}
