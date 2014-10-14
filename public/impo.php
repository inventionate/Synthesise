<?php

require_once '/home/vagrant/synthesise/storage/app/users/mentoren.php';

$num = 0;
foreach ($mentoren as $mentor)
{
  echo $num;
  $num ++;
}
