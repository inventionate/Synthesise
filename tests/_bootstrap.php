<?php

// AspectMock laden
$kernel = \AspectMock\Kernel::getInstance();
$kernel->init([
    'debug' => true,
    'includePaths' => [__DIR__.'/../src'],
]);
$kernel->loadFile(__DIR__.'/../bootstrap/autoload.php'); // path to your autoloader

